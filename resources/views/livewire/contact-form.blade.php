<div>
    <div
        class="contact-toast"
        x-data="{ visible: false, message: '', type: 'success', timer: null }"
        x-on:contact-notification.window="message = $event.detail.message; type = $event.detail.type; visible = true; clearTimeout(timer); timer = setTimeout(() => visible = false, 7000)"
        x-show="visible"
        x-cloak
        x-transition
        x-bind:class="{ 'contact-toast-error': type === 'error' }"
        role="status"
        aria-live="polite"
    >
        <span x-text="message"></span>
        <button type="button" class="contact-toast-close" aria-label="Dismiss notification" x-on:click="visible = false">&times;</button>
    </div>

    <details class="contact-disclosure" wire:ignore.self>
        <summary class="btn btn-primary">
            Send a message
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
        </summary>
        <noscript>
            <style>.contact-form { display: none; }</style>
            <p class="contact-noscript">Please enable JavaScript to send a message using this form.</p>
        </noscript>
        <form class="contact-form" wire:submit="send">
            <div class="contact-fields">
                <div class="contact-field">
                    <label for="contact-name">Name</label>
                    <input id="contact-name" name="name" type="text" autocomplete="name" wire:model="name" required maxlength="120" @if ($errors->has('name')) aria-invalid="true" aria-describedby="contact-name-error" @endif>
                    @error('name') <p class="field-error" id="contact-name-error">{{ $message }}</p> @enderror
                </div>
                <div class="contact-field">
                    <label for="contact-email">Email</label>
                    <input id="contact-email" name="email" type="email" autocomplete="email" wire:model="email" required maxlength="254" @if ($errors->has('email')) aria-invalid="true" aria-describedby="contact-email-error" @endif>
                    @error('email') <p class="field-error" id="contact-email-error">{{ $message }}</p> @enderror
                </div>
                <div class="contact-field contact-field-full">
                    <label for="contact-subject">Subject <span>(optional)</span></label>
                    <input id="contact-subject" name="subject" type="text" wire:model="subject" maxlength="150" @if ($errors->has('subject')) aria-invalid="true" aria-describedby="contact-subject-error" @endif>
                    @error('subject') <p class="field-error" id="contact-subject-error">{{ $message }}</p> @enderror
                </div>
                <div class="contact-field contact-field-full">
                    <label for="contact-message">Message</label>
                    <textarea id="contact-message" name="message" wire:model="message" required maxlength="5000" @if ($errors->has('message')) aria-invalid="true" aria-describedby="contact-message-error" @endif></textarea>
                    @error('message') <p class="field-error" id="contact-message-error">{{ $message }}</p> @enderror
                </div>
            </div>
            <button class="btn btn-primary contact-submit" type="submit" wire:loading.attr="disabled" wire:target="send">
                <span wire:loading.remove wire:target="send">Send message</span>
                <span wire:loading wire:target="send">Sending...</span>
            </button>
        </form>
    </details>
</div>
