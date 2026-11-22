<?php

namespace App\Livewire;

use App\Mail\ContactMessage;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;
use Throwable;

class ContactForm extends Component
{
    public string $name = '';

    public string $email = '';

    public string $subject = '';

    public string $message = '';

    public function send(): void
    {
        $key = 'contact-form:'.request()->ip();

        if (RateLimiter::tooManyAttempts($key, 5)) {
            $this->dispatch('contact-notification', message: 'Too many attempts. Please wait a minute and try again.', type: 'error');

            return;
        }

        RateLimiter::hit($key, 60);

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email:rfc', 'max:254'],
            'subject' => ['nullable', 'string', 'max:150'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        try {
            Mail::to(config('services.contact_email'))->send(new ContactMessage(
                name: $validated['name'],
                email: $validated['email'],
                contactSubject: $validated['subject'] ?? null,
                contactBody: $validated['message'],
            ));
        } catch (Throwable $exception) {
            report($exception);
            $this->dispatch('contact-notification', message: 'Sorry, your message could not be sent. Please try again.', type: 'error');

            return;
        }

        $this->reset('name', 'email', 'subject', 'message');
        $this->dispatch('contact-notification', message: 'Thanks for reaching out! Your message has been sent.', type: 'success');
    }

    public function render(): View
    {
        return view('livewire.contact-form');
    }
}
