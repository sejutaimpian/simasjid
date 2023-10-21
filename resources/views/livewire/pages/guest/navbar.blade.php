<?php

use function Livewire\Volt\{state};

//

?>

<header>
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
            <a href="{{ route('dev') }}" wire:navigate class="flex items-center">
                <img src="{{ asset('assets/logo-masjid.png') }}" class="h-8 mr-3" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Baiturrahim</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="flex flex-col items-center p-4 mt-4 font-medium border border-gray-100 rounded-lg md:p-0 bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li class="w-full text-center">
                        <a href="{{ route('home') }}" wire:navigate
                            class="{{ (request()->segment(1) == null) ? 'underline underline-offset-4': '' }} md:hover:text-emerald-500 block py-2 rounded md:bg-transparent md:p-0 dark:text-white md:dark:text-blue-500"
                            aria-current="page">Home</a>
                    </li>
                    <li class="w-full text-center">
                        <a href="{{ route('agenda') }}" wire:navigate
                            class="{{ (request()->segment(1) == 'agenda') ? 'underline underline-offset-4': '' }} md:hover:text-emerald-500 block py-2 rounded md:bg-transparent md:p-0 dark:text-white md:dark:text-blue-500"
                            aria-current="page">Agenda</a>
                    </li>
                    <li class="w-full text-center">
                        <a href="{{ route('artikel') }}" wire:navigate
                            class="{{ (request()->segment(1) == 'artikel') ? 'underline underline-offset-4': '' }} md:hover:text-emerald-500 block py-2 rounded md:bg-transparent md:p-0 dark:text-white md:dark:text-blue-500"
                            aria-current="page">Artikel</a>
                    </li>
                    <li class="w-full text-center">
                        <a href="{{ route('ustaz') }}" wire:navigate
                            class="{{ (request()->segment(1) == 'ustaz') ? 'underline underline-offset-4': '' }} md:hover:text-emerald-500 block py-2 rounded md:bg-transparent md:p-0 dark:text-white md:dark:text-blue-500"
                            aria-current="page">Ustaz</a>
                    </li>
                    <li class="w-full text-center">
                        <a href="{{ route('dkm') }}" wire:navigate
                            class="{{ (request()->segment(1) == 'dkm') ? 'underline underline-offset-4': '' }} md:hover:text-emerald-500 block py-2 rounded md:bg-transparent md:p-0 dark:text-white md:dark:text-blue-500"
                            aria-current="page">DKM</a>
                    </li>
                    <li class="w-full text-center">
                        <a href="{{ route('kas') }}" wire:navigate
                            class="{{ (request()->segment(1) == 'kas') ? 'underline underline-offset-4': '' }} md:hover:text-emerald-500 block py-2 rounded md:bg-transparent md:p-0 dark:text-white md:dark:text-blue-500"
                            aria-current="page">Kas</a>
                    </li>
                    <li class="w-full text-center">
                        <a href="{{ route('login') }}" wire:navigate
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded bg-emerald-100 md:border md:border-emerald-600 md:hover:text-emerald-500 md:px-2 md:py-0">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>