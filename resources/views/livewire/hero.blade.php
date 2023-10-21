<?php

use App\Models\Profile;
use function Livewire\Volt\{computed};

$profile = computed(fn() => Profile::first());

?>
<section
    class="bg-center bg-no-repeat bg-[url('/public/img/profile/jumbotron.jpg')] bg-cover bg-gray-700 bg-blend-multiply">
    <div class="max-w-screen-xl px-4 py-24 mx-auto text-center lg:py-56">
        <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight text-white md:text-5xl lg:text-6xl">
            {{ $this->profile->tagline }}
        </h1>
        <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">
            {{ $this->profile->description }}
        </p>
    </div>
</section>