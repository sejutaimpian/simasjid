<?php

use App\Models\Ustaz;
use Illuminate\Support\Str;
use function Livewire\Volt\{layout, rules, state, title, usesFileUploads};

usesFileUploads();

title('Artikel');
layout('layouts.dashboard');

state(['name', 'description', 'image']);

rules(['name' => 'required|min:3', 'description' => 'required|min:6', 'image' => 'image|max:2048']);

$save = function(){
    $this->validate();
    
    $imageName = $this->image->store('Ustaz Image');

    Ustaz::create(
        [
            'name' => Str::headline($this->name),
            'description' => $this->description,
            'image' => $imageName,
            'link' => '#',
        ]);
        
    session()->flash('success', 'Berhasil menambahkan data ustaz/ah');
    $this->redirect('/dashboard/ustaz', navigate:true);     
};

?>

<div>
    <h2 class="flex-1 mb-3 text-3xl font-semibold text-center uppercase md:mb-4">Tambah Ustaz/ah</h2>
    <form wire:submit='save'
        class="max-w-screen-xl p-4 mx-auto space-y-2 bg-white rounded shadow md:p-6 lg:p-10 md:space-y-5">
        <div>
            <label class="block text-sm font-medium text-gray-700">
                Image
            </label>
            <input wire:model='image' accept="image/png, image/jpg, image/jpeg" type="file" name="image" id="image"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
            @error('image')
            <div class="text-sm text-red-500 mt-0.5">{{ $message }}</div>
            @enderror
            @if ($image)
            <img class="object-cover w-full mx-auto mt-1 rounded aspect-square md:w-1/3"
                src="{{ $image->temporaryUrl() }}" alt="">
            @endif
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">
                Nama
            </label>
            <input wire:model='name' type="text" name="name" id="name"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
            @error('name')
            <div class="text-sm text-red-500 mt-0.5">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">
                Description
            </label>
            <textarea wire:model='description' type="text" name="description" id="description"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500"></textarea>
            @error('description')
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