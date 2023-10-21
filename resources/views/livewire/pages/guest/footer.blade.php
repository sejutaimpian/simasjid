<?php

use function Livewire\Volt\{state};

//

?>
<footer class="container mx-auto mt-4 bg-gray-800 rounded-lg shadow md:mt-8 md:mb-4">
    <div class="w-full max-w-screen-xl p-4 mx-auto md:flex md:items-center md:justify-between">
        <span class="text-sm text-gray-100 sm:text-center dark:text-gray-400">© 2023 <a
                href="https://github.com/sejutaimpian" class="hover:underline">Eris Sulistina</a>. All Rights
            Reserved.
        </span>
        <ul
            class="flex flex-wrap items-center gap-4 mt-3 text-sm font-medium text-gray-100 md:gap-6 dark:text-gray-400 sm:mt-0">
            <li>
                <a href="{{ route('home') }}" wire:navigate class="hover:underline">Home</a>
            </li>
            <li>
                <a href="{{ route('agenda') }}" wire:navigate class="hover:underline">Agenda</a>
            </li>
            <li>
                <a href="{{ route('artikel') }}" wire:navigate class="hover:underline">Artikel</a>
            </li>
            <li>
                <a href="{{ route('ustaz') }}" wire:navigate class="hover:underline">Ustaz</a>
            </li>
            <li>
                <a href="{{ route('dkm') }}" wire:navigate class="hover:underline">DKM</a>
            </li>
            <li>
                <a href="{{ route('kas') }}" wire:navigate class="hover:underline">Kas</a>
            </li>
        </ul>
    </div>
</footer>