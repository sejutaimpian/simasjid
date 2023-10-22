<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Models\Event;
use function Livewire\Volt\{layout, mount, state, title, usesPagination, with};

title('Agenda');
layout('layouts.dashboard');

usesPagination();

state(['perPage', 'search', 'sortBy', 'sortDir', 'start', 'finish']);

mount(function(){
    $this->start = now()->startOfDay();
    $this->finish = now()->addMonth();
    $this->perPage = 5;
    $this->search = '';
    $this->sortBy = 'time';
    $this->sortDir = 'DESC';
});

with(fn () => ['events' => Event::whereBetween('time', [$this->start, $this->finish])->search($this->search)->orderBy($this->sortBy, $this->sortDir)->paginate($this->perPage)]);

$delete = function (Event $event){
    session()->flash('success', 'Berhasil menghapus agenda');
    $event->delete();
};

$setSortBy = function($sortByField){
    if ($sortByField === $this->sortBy) {
       $this->sortDir = ($this->sortDir === 'DESC') ? 'ASC' : 'DESC';
       return;
    }
    $this->sortBy = $sortByField;
    $this->sortDir = 'DESC';
};

?>
<section>
    @if (session()->has('success'))
    <div x-data="{
        show:true,
        setShow(){
            this.show = true;
            setTimeout(() => this.show = false, 2000);
        }
    }">
        <!-- Flash Message -->
        <div class="fixed z-10 inline-flex max-w-sm overflow-hidden text-gray-800 bg-white border rounded-lg shadow-md dark:bg-gray-950 dark:text-gray-100 top-14 right-4 sm:w-1/2"
            role="alert" x-show="show" x-transition.opacity.out.duration.1500ms x-init="setShow()">
            <div class="flex items-center justify-center w-12 pb-1 bg-emerald-500">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-6 h-6 text-white fill-current">
                    <path fill-rule="evenodd"
                        d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                        clip-rule="evenodd" />
                </svg>
            </div>
            <div class="flex-1 px-4 pt-2 pb-3">
                <span class="font-semibold text-green-500">Success</span>
                <p class="text-sm">{{ session('success') }}</p>
            </div>
            <div class="absolute bottom-0 left-0 right-0 w-full h-1 bg-green-100 group">
                <span class="absolute top-0 bottom-0 left-0 w-full h-full bg-green-500 animate-progress"></span>
            </div>
        </div>
    </div>
    @endif
    <div class="flex items-center justify-between">
        <h2 class="mb-1 text-3xl font-semibold md:mb-2">Agenda</h2>
        <a href="{{ route('agendaBuat') }}" wire:navigate
            class="inline-flex justify-end gap-2 px-4 py-2 rounded bg-emerald-200 w-fit hover:bg-emerald-100">
            <span class="hidden sm:block">
                Tambah Agenda
            </span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </a>
    </div>
    <div class="mt-4">
        <div class="max-w-screen-xl mx-auto lg:px-12">
            <!-- Start coding here -->
            <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                <div class="flex items-center justify-between p-4 d">
                    <div class="flex">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                    fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" wire:model.live.debounce.1s='search'
                                class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 "
                                placeholder="Search" required="">
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-4 py-3" wire:click="setSortBy('event_name')">
                                    <button class="flex items-center gap-1">
                                        NAMA AGENDA
                                        @if ($sortBy !== 'event_name')
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                        @elseif ($sortDir === 'ASC')
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                                        </svg>
                                        @else
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                        @endif
                                    </button>
                                </th>
                                <th scope="col" class="px-4 py-3">LOKASI</th>
                                <th scope="col" class="px-4 py-3">PESERTA</th>
                                <th scope="col" class="px-4 py-3" wire:click="setSortBy('time')">
                                    <button class="flex items-center gap-1">
                                        WAKTU
                                        @if ($sortBy !== 'time')
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                        @elseif ($sortDir === 'ASC')
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                                        </svg>
                                        @else
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                        @endif
                                    </button>
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)
                            <tr wire:key="{{ $event->id }}" class="border-b dark:border-gray-700">
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 dark:text-white">
                                    {{ $event->event_name }}
                                </th>
                                <td class="px-4 py-3">{{ $event->location }}</td>
                                <td class="px-4 py-3">{{ $event->participant }}</td>
                                <td class="px-4 py-3">
                                    {{ Carbon::parse($event->time)->translatedFormat('d F Y - H:i T') }}
                                </td>
                                <td class="flex items-center justify-end gap-2 px-4 py-3">
                                    <button x-on:click="
                                    if(confirm('Are you sure you want to delete this data?')){ $wire.delete({{ $event->id }})}
                                    " class="px-2 py-1 text-white bg-red-500 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button>
                                    <a href="{{ url('dashboard/agenda/edit') . '/' . $event->id }}" wire:navigate
                                        class="px-2 py-1 text-white rounded bg-amber-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="px-3 py-4">
                    <div class="flex ">
                        <div class="flex items-center mb-3 space-x-4">
                            <label class="w-32 text-sm font-medium text-gray-900">Per Page</label>
                            <select wire:model.live='perPage'
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>
                    {{ $events->links() }}
                </div>
            </div>
        </div>
    </div>
</section>