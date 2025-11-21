<?php

use Livewire\Volt\Component;

new class extends Component
{
    public string $hello;

    public function mount()
    {
        $this->hello = __('Hello World');
    }
};
?>

<div>
    <h1>{{ $hello }}</h1>
</div>