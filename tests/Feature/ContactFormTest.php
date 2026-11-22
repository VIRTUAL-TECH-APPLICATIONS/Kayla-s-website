<?php

use App\Livewire\ContactForm;
use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Livewire;

test('contact form sends a message to Kayla and sets the reply-to address', function () {
    Mail::fake();
    config()->set('services.contact_email', 'cowgirlkayla1222@gmail.com');

    Livewire::test(ContactForm::class)
        ->set('name', 'Taylor Shopper')
        ->set('email', 'taylor@example.com')
        ->set('subject', 'Product question')
        ->set('message', 'Could you recommend a kitchen organizer?')
        ->call('send')
        ->assertHasNoErrors()
        ->assertDispatched('contact-notification', type: 'success')
        ->assertSet('name', '')
        ->assertSet('email', '')
        ->assertSet('subject', '')
        ->assertSet('message', '');

    Mail::assertSent(ContactMessage::class, function (ContactMessage $mail) {
        expect($mail->to)->not->toBeEmpty()
            ->and($mail->to[0]['address'])->toBe('cowgirlkayla1222@gmail.com')
            ->and($mail->email)->toBe('taylor@example.com')
            ->and($mail->contactSubject)->toBe('Product question')
            ->and($mail->contactBody)->toBe('Could you recommend a kitchen organizer?')
            ->and($mail->envelope()->replyTo[0]->address)->toBe('taylor@example.com');

        return true;
    });
});

test('contact form validates required and valid email fields', function () {
    Mail::fake();

    Livewire::test(ContactForm::class)
        ->set('name', 'Taylor Shopper')
        ->set('email', 'not-an-email')
        ->set('message', '')
        ->call('send')
        ->assertHasErrors(['email', 'message'])
        ->assertSet('name', 'Taylor Shopper');

    Mail::assertNothingSent();
});

test('contact form limits attempts without discarding the message', function () {
    Mail::fake();
    $key = 'contact-form:127.0.0.1';
    RateLimiter::clear($key);

    try {
        for ($i = 0; $i < 5; $i++) {
            RateLimiter::hit($key, 60);
        }

        Livewire::test(ContactForm::class)
            ->set('message', 'Please keep this message')
            ->call('send')
            ->assertDispatched('contact-notification', type: 'error')
            ->assertSet('message', 'Please keep this message');

        Mail::assertNothingSent();
    } finally {
        RateLimiter::clear($key);
    }
});

test('contact form reports mail failures without discarding input', function () {
    Mail::shouldReceive('to')->once()->andThrow(new RuntimeException('Mail transport failed'));

    Livewire::test(ContactForm::class)
        ->set('name', 'Taylor Shopper')
        ->set('email', 'taylor@example.com')
        ->set('message', 'Please keep this message')
        ->call('send')
        ->assertDispatched('contact-notification', type: 'error')
        ->assertSet('message', 'Please keep this message');
});

test('contact form renders and sends through the mail transport', function () {
    Livewire::test(ContactForm::class)
        ->set('name', 'Taylor Shopper')
        ->set('email', 'taylor@example.com')
        ->set('message', 'Hello Kayla')
        ->call('send')
        ->assertDispatched('contact-notification', type: 'success')
        ->assertSet('message', '');
});

test('contact email template includes branded light and dark color schemes', function () {
    $html = (new ContactMessage(
        name: 'Taylor Shopper',
        email: 'taylor@example.com',
        contactSubject: null,
        contactBody: "Hello Kayla\n<script>alert('test')</script>",
    ))->render();

    expect($html)
        ->toContain("Kayla's Korner")
        ->toContain('color-scheme: light dark')
        ->toContain('prefers-color-scheme: dark')
        ->toContain('Hello Kayla<br')
        ->toContain('&lt;script&gt;')
        ->not->toContain('<script>');
});
