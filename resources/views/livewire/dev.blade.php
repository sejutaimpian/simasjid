<?php

use App\Models\Article;
use function Livewire\Volt\{computed, layout, state, title, mount};

state(['isHome', 'firstArticle', 'artikel']);

$articles = computed(function(){
        return Article::all();
});

mount(function(){
    // $this->firstArticle = Article::latest()->first();
});


layout('layouts.dashboard');
title('Developer');

?>

<section class="container px-4 mx-auto my-4 md:my-8">
    <div>
        <div class="flex items-center justify-between">
            @if ($isHome)
            <h2 class="mb-1 text-3xl font-semibold md:mb-2">KAS</h2>
            <a href="{{ route('kas') }}" wire:navigate
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
            <h2 class="flex-1 mb-3 text-3xl font-semibold text-center uppercase md:mb-4">Kas Masjid</h2>
            @endif
        </div>
        <div>
            <div
                class="flex flex-col items-center justify-center w-2/3 max-w-xl mx-auto border-t rounded-t-lg bg-slate-100 border-x border-slate-900 mt-7">
                <div class="p-2 bg-white border rounded-full -mt-7 border-slate-900 aspect-square">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                    </svg>
                </div>
                <h4 class="my-4 text-3xl font-semibold md:text-4xl">Rp{{ number_format(3521000, 0, ',','.') }}
                </h4>
            </div>
            <div class="overflow-hidden border rounded-lg border-slate-900">
                <div class="flex flex-col md:flex-row">
                    <div class="relative flex-1 p-4 bg-rose-50">
                        <div class="text-xl md:text-2xl">Pengeluaran</div>
                        <h4 class="text-3xl font-semibold md:text-4xl">Rp{{ number_format(3521000, 0, ',','.') }}
                        </h4>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="absolute top-0 opacity-25 right-1/4 w-14">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 6L9 12.75l4.286-4.286a11.948 11.948 0 014.306 6.43l.776 2.898m0 0l3.182-5.511m-3.182 5.51l-5.511-3.181" />
                        </svg>
                    </div>
                    <div class="relative flex-1 p-4 bg-emerald-50">
                        <div class="text-xl md:text-2xl">Pemasukan</div>
                        <h4 class="text-3xl font-semibold md:text-4xl">Rp{{ number_format(3521000, 0, ',','.') }}
                        </h4>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="absolute top-0 opacity-25 right-1/4 w-14">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>