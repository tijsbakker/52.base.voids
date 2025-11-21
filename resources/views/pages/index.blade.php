<?php

use function Laravel\Folio\name;

name('module.home');

?>

<x-layout>
    <div class="h-screen flex items-center justify-center bg-sky-800">
        <h1 class="text-4xl font-bold">{{ __('Hello World') }}</h1>
    </div>
</x-layout>