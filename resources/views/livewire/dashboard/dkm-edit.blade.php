<?php

use App\Models\Dkm;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use function Livewire\Volt\{layout, mount, rules, state, title, usesFileUploads};

usesFileUploads();

layout('layouts.dashboard');
title('Edit DKM');

state(['dkm','name', 'position', 'image']);

mount(function($id){
    $this->dkm = Dkm::find($id);
    $this->name = $this->dkm->name;
    $this->position = $this->dkm->position;
});

rules(['name' => 'required|min:3', 'position' => 'required|min:6', 'image' => 'image|nullable|max:2048']);

$save = function(){
    $this->validate();
    if($this->image){
        Storage::delete($this->dkm->image);
        $imageName = $this->image->store('Dkm Image');
    }else{
        $imageName = $this->dkm->image;
    }

    Dkm::where('id', $this->dkm->id)->update(
        [
            'name' => Str::headline($this->name),
            'image' => $imageName,
            'position' => $this->position,
            'link' => $this->dkm->link,
            'description' => $this->dkm->description
        ]);
        
    session()->flash('success', 'Berhasil mengupdate DKM');
    $this->redirect('/dashboard/dkm', navigate:true);     
};

?>

<div>
    <h2 class="flex-1 mb-3 text-3xl font-semibold text-center uppercase md:mb-4">Edit DKM</h2>
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
            <img class="object-cover w-full mx-auto mt-1 rounded aspect-square md:w-1/3"
                src="{{ ($image) ? $image->temporaryUrl() : asset('storage') . '/' . $dkm->image }}" alt="">
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
                Position
            </label>
            <textarea wire:model='position' type="text" name="position" id="position"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500"></textarea>
            @error('position')
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