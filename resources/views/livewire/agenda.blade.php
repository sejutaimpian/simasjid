<?php

use Illuminate\Support\Carbon;
use App\Models\Event;
use function Livewire\Volt\{computed, layout, state, title, mount};

state(['isHome', 'todayEvents']);

$events = computed(function(){
        $start = now()->startOfDay();
        $finish = now()->addMonth();
        return Event::whereBetween('time', [$start, $finish])->orderBy('time')->get();
});

mount(function(){
    $this->todayEvents = $this->events->filter(function($event){
        return Carbon::parse($event->time)->floorDay() == today();
    });
});

layout('layouts.app');
title('Agenda');
?>

<section class="container mx-auto my-5 md:my-8">
    @if (!$isHome)
    <h2 class="flex-1 mb-3 text-3xl font-semibold text-center uppercase md:mb-4">AGENDA</h2>
    @endif
    <div
        class="relative flex flex-col gap-5 p-4 my-5 text-lg border rounded-lg text-emerald-800 border-emerald-300 bg-emerald-50 lg:text-3xl md:my-8">
        @foreach ($todayEvents as $event)
        <div class="flex flex-col justify-between gap-3 md:flex-row">
            <div class="flex flex-1 gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="flex-shrink-0 w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                </svg>
                <div class="flex flex-col">
                    <span class="font-medium">Hari Ini!</span>
                    <span>
                        {{ $event->event_name }}
                    </span>
                </div>
            </div>
            <div class="flex flex-col justify-between flex-1 text-base lg:text-2xl">
                <div class="flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="flex-shrink-0 w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div>{{ Carbon::parse($event->time)->format('H:i T') }}</div>
                </div>
                <div class="flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="flex-shrink-0 w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                    </svg>
                    <div>{{ $event->location }}</div>
                </div>
                <div class="flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="flex-shrink-0 w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                    </svg>
                    <div>{{ $event->participant }}</div>
                </div>
            </div>
        </div>
        @endforeach
        @if ($isHome)
        <div class="absolute inset-y-0 flex items-center right-2">
            <a href="{{ url()->current() . '/agenda'}}" wire:navigate class=" px-2 py-0.5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                </svg>
            </a>
        </div>
        @endif
    </div>
    {{-- Semua Kegiatan --}}
    @if (!$isHome)
    <div class="relative overflow-x-auto">
        <table class="w-full text-left lg:text-lg text-slate-500">
            <thead class="font-bold uppercase text-slate-900 bg-emerald-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama Kegiatan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Waktu
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tempat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Peserta
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->events; as $event)
                <tr class="bg-white border-b text-slate-800">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap dark:text-white">
                        {{ $event->event_name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ Carbon::parse($event->time)->translatedFormat('d F Y - H:i T') }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $event->location }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $event->participant }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</section>