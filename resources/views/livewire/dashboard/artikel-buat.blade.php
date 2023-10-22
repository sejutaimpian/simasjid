<?php

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use function Livewire\Volt\{layout, mount, rules, state, title, usesFileUploads};

usesFileUploads();

title('Artikel');
layout('layouts.dashboard');

state(['title', 'body', 'image', 'category_id', 'categories']);

mount(function(){
    $this->categories = Category::all();
});

rules(['title' => 'required|min:6', 'body' => 'required|min:6', 'image' => 'image|max:2048', 'category_id' => 'required']);

$save = function(){
    $this->validate();
    
    $imageName = $this->image->store('Article Image');

    Article::create(
        [
            'title' => Str::headline($this->title),
            'category_id' => $this->category_id,
            'slug' => Str::of($this->title)->slug('-'),
            'excerpt' => Str::limit(strip_tags($this->body), 100),
            'image' => $imageName,
            'body' => $this->body
        ]);
        
    session()->flash('success', 'Berhasil menambahkan artikel');
    $this->redirect('/dashboard/artikel', navigate:true);     
};

?>

@push('head')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
@endpush

<div>
    <h2 class="flex-1 mb-3 text-3xl font-semibold text-center uppercase md:mb-4">Buat Artikel</h2>
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
            <img class="object-cover w-full mx-auto mt-1 rounded aspect-video md:w-1/2"
                src="{{ $image->temporaryUrl() }}" alt="">
            @endif
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">
                Title
            </label>
            <input wire:model='title' type="text" name="title" id="title"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
            @error('title')
            <div class="text-sm text-red-500 mt-0.5">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">
                Category
            </label>
            <select wire:model='category_id' name="category" id="category">
                <option value="">Pilih Kategori</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
            <div class="text-sm text-red-500 mt-0.5">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <div wire:ignore>
                <label class="block text-sm font-medium text-gray-700">
                    Body
                </label>
                <div class="caret-black" x-data x-ref='editor' x-init="
                    const quill = new Quill($refs.editor, {
                        theme: 'snow'
                    });
                    quill.on('text-change', ()=>{
                        $wire.set('body', quill.root.innerHTML)
                    });
                ">
                </div>
            </div>
            @error('body')
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