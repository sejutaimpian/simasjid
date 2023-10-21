<?php

use App\Models\Dkm;
use function Livewire\Volt\{computed, layout, state, title};

state('isHome');

$dkm = computed(function(){
    if ($this->isHome) {
        return Dkm::limit(3)->get();
    } else {
        return Dkm::all();
    }
});


layout('layouts.app');
title('Dewan Kemakmuran Masjid');


?>

<section class="container px-4 mx-auto my-5 md:my-8">
    <div class="flex items-center justify-between">
        @if ($isHome)
        <h2 class="mb-1 text-3xl font-semibold md:mb-2">DKM</h2>
        <a href="{{ route('dkm') }}" wire:navigate
            class="inline-flex justify-end px-2 py-1 cursor-pointer w-fit hover:bg-slate-100">
            <span class="hidden md:block">
                selengkapnya
            </span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </a>
        @else
        <h2 class="flex-1 mb-3 text-3xl font-semibold text-center uppercase md:mb-4">Dewan Kemakmuran Masjid</h2>
        @endif
    </div>
    <div class="grid grid-cols-1 gap-2 mb-4 md:gap-4 sm:grid-cols-2 md:grid-cols-3 md:mb-8">
        @foreach ($this->dkm as $dkm)
        <div class="relative overflow-hidden rounded-lg group">
            <img class="object-cover max-w-full aspect-square lg:aspect-video"
                src="{{ asset('img') . '/' . $dkm->image }}" alt="{{ $dkm->name }}">
            <div
                class="absolute inset-x-0 bottom-0 px-4 pt-2 pb-1 text-xl text-white duration-200 bg-slate-900/80 md:translate-y-full group-hover:translate-y-0">
                <div class="px-2 text-sm rounded bg-emerald-500 w-fit">{{ $dkm->position }}</div>
                <div>{{ $dkm->name }}</div>
            </div>
        </div>
        @endforeach
    </div>
</section>