<?php

use Illuminate\Support\Carbon;
use App\Models\Article;
use function Livewire\Volt\{layout, mount, state, title};

state(['article']);

mount(function($slug){
    $this->article = Article::firstWhere('slug', $slug);
});

layout('layouts.app');
title('Artikel Detail');

?>

<div class="container mx-auto my-5 md:my-8">
    <div class="flex flex-col gap-2 mx-4 md:gap-4">
        <img class="w-auto mx-auto rounded-lg md:max-w-3xl" src="{{ asset('storage') . '/' . $article->image }}"
            alt="{{ $article->title }}" />
        <div class="flex gap-3">
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                </svg>
                <div class="text-sm mt-0.5">{{ Carbon::parse($article->created_at)->translatedFormat('d F Y - H:i T') }}
                </div>
            </div>
            <a href="{{ route('artikel', ['c' => $article->category->id ]) }}" wire:navigate
                class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                </svg>
                <div class="text-sm mt-0.5">{{ $article->category->name }}</div>
            </a>
        </div>
        <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            {{ $article->title }}
        </h5>
        <div class="[&>*]:mb-4">
            {!! $article->body !!}
        </div>
    </div>
</div>