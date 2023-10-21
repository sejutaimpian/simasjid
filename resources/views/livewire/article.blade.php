<?php

use App\Models\Article;
use function Livewire\Volt\{computed, layout, state, title, mount};

state(['isHome', 'firstArticle', 'artikel']);

state(['category'])->url(as: 'c');

$articles = computed(function(){
        if ($this->category) {
            return Article::with('category')->where('category_id', $this->category)->get();
        } else {
            return Article::with('category')->get();
        }
});

mount(function(){
    $this->firstArticle = Article::latest()->first();
});


layout('layouts.app');
title('Artikel');
?>

<section class="container mx-auto my-5 md:my-8">
    @if ($isHome)
    <div class="grid items-center grid-cols-1 px-4 md:gap-5 md:grid-cols-2">
        <a href="{{ url('artikel') . '/' . $firstArticle->slug }}" wire:navigate
            class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ $firstArticle->title }}
            </h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">{{ $firstArticle->excerpt }}</p>
        </a>
        <a href="{{ route('artikel') }}" wire:navigate
            class="flex items-center justify-between px-2 py-4 bg-white rounded-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl tracking-tight text-gray-900 dark:text-white">Lihat semua artikel
            </h5>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </a>
    </div>
    @else
    <div>
        <h2 class="flex-1 mb-3 text-3xl font-semibold text-center uppercase md:mb-4"><span class="cursor-pointer"
                wire:click="$set('category', '')">Artikel</span></h2>
        <div
            class="grid justify-center grid-cols-1 gap-2 mx-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 2xl:grid-cols-5 md:gap-4">
            @foreach ($this->articles as $article)
            <div
                class="flex flex-col gap-2 p-2 bg-white border border-gray-200 shadow rounded-xl dark:bg-gray-800 dark:border-gray-700">
                <a href="{{ url('artikel') . '/' . $article->slug }}" wire:navigate>
                    <img class="rounded-lg" src="{{ asset('img/article') . '/' . $article->image }}" alt="" />
                </a>
                <div class="">
                    <button wire:click="$set('category', {{ $article->category->id }})"
                        class="bg-emerald-100 px-2 py-0.5 text-emerald-900">{{
                        $article->category->name }}</button>
                </div>
                <div class="px-2">
                    <a href="{{ url('artikel') . '/' . $article->slug }}" wire:navigate>
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $article->title }}
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        {{ $article->excerpt }}
                    </p>
                    <a href="{{ url('artikel') . '/' . $article->slug }}" wire:navigate
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300">
                        Read more
                        <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</section>