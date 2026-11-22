<?php

test('returns a successful response', function () {
    $response = $this->get('/');

    $response->assertOk();
});

test('contact links use the current phone number and email', function () {
    $this->get('/')
        ->assertOk()
        ->assertSee('tel:+16788863780')
        ->assertSee('(678) 886-3780')
        ->assertSee('mailto:cowgirlkayla1222@gmail.com')
        ->assertDontSee('tel:+14048447357');

    $this->view('errors.404')
        ->assertSee('tel:+16788863780')
        ->assertSee('(678) 886-3780')
        ->assertDontSee('tel:+14048447357');
});
