<div class="newsletter-body">
    @if($subscribed)
        <p class="newsletter-text" style="color: #1B6B3A; font-weight: 600;">✓ You're subscribed! Check your inbox.</p>
    @else
        <p class="newsletter-text">Get curated judgments, legislative updates and legal analysis delivered to your inbox every morning at 8 AM.</p>
        <form wire:submit.prevent="subscribe">
            <input type="email" class="newsletter-input" wire:model="email" placeholder="Your email address" />
            @error('email') <span style="color: var(--crimson); font-size: 12px;">{{ $message }}</span> @enderror
            <input type="text" class="newsletter-input" wire:model="designation" placeholder="Your designation (optional)" />
            <button type="submit" class="newsletter-btn" wire:loading.attr="disabled">
                <span wire:loading.remove>Subscribe Free</span>
                <span wire:loading>Subscribing…</span>
            </button>
        </form>
    @endif
</div>
