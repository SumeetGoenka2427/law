<?php

namespace App\Livewire\Forms;

use Livewire\Component;

class NewsletterForm extends Component
{
    public string $email = '';
    public string $designation = '';
    public bool $subscribed = false;

    protected array $rules = [
        'email' => 'required|email|max:255',
        'designation' => 'nullable|max:100',
    ];

    public function subscribe()
    {
        $this->validate();
        // TODO: store or mail subscription
        $this->subscribed = true;
        $this->reset(['email', 'designation']);
    }

    public function render()
    {
        return view('livewire.forms.newsletter-form');
    }
}
