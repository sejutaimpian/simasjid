<?php

use App\Models\Event;
use Illuminate\Support\Str;
use function Livewire\Volt\{layout, mount, rules, state, title};

title('Edit Agenda');
layout('layouts.dashboard');

state(['events','event_name', 'location', 'participant', 'time']);

mount(function($id){
    $this->events = Event::find($id);
    $this->event_name = $this->events->event_name;
    $this->location = $this->events->location;
    $this->participant = $this->events->participant;
    $this->time = $this->events->time;
});

rules(['event_name' => 'required|min:4', 'location' => 'required|min:4','participant' => 'required|min:4','time' => 'required|date',]);

$save = function(){
    $this->validate();

    Event::where('id', $this->events->id)->update(
        [
            'event_name' => Str::headline($this->event_name),
            'location' => $this->location,
            'participant' => $this->participant,
            'time' => $this->time
        ]);
        
    session()->flash('success', 'Berhasil mengupdate Agenda');
    $this->redirect('/dashboard/agenda', navigate:true);     
};

?>

<div>
    <h2 class="flex-1 mb-3 text-3xl font-semibold text-center uppercase md:mb-4">Edit Agenda</h2>
    <form wire:submit='save'
        class="max-w-screen-xl p-4 mx-auto space-y-2 bg-white rounded shadow md:p-6 lg:p-10 md:space-y-5">
        <div>
            <label class="block text-sm font-medium text-gray-700">
                Nama Agenda
            </label>
            <input wire:model='event_name' type="text" name="event_name" id="event_name"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
            @error('event_name')
            <div class="text-sm text-red-500 mt-0.5">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">
                Lokasi
            </label>
            <input wire:model='location' type="text" name="location" id="location"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
            @error('location')
            <div class="text-sm text-red-500 mt-0.5">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">
                Peserta
            </label>
            <input wire:model='participant' type="text" name="participant" id="participant"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
            @error('participant')
            <div class="text-sm text-red-500 mt-0.5">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">
                Waktu
            </label>
            <input wire:model='time' type="datetime-local" name="time" id="time"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
            @error('time')
            <div class="text-sm text-red-500 mt-0.5">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex justify-end gap-2">
            <div>
                <a href="{{ url()->previous() }}" wire:navigate class="px-4 py-2 rounded text-emerald-900">Kembali</a>
                <button type="submit"
                    class="px-4 py-2 rounded bg-emerald-200 hover:bg-emerald-100 text-emerald-900">Submit</button>
            </div>
        </div>
    </form>
</div>