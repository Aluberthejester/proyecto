<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Create Songs') }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">

                <form action="{{ route('songs.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <label for="title">
                {{ __('title') }}
                </label>
                <input type="text" name="title" id="title">
                @error('title')
                <div>
                {{ $message }}
                </div>
                @enderror

                <label for="length">
                {{ __('length') }}
                </label>
                <input type="text" name="length" id="length">
                @error('length')
                <div>
                {{ $message }}
                </div>
                @enderror

                <label for="track">
                {{ __('Track') }}
                </label>
                <input type="number" name="track" id="track">
                @error('track')
                <div>
                {{ $message }}
                </div>
                @enderror

                <label for="disc">
                {{ __('Disc') }}
                </label>
                <input type="number" name="disc" id="disc">
                @error('disc')
                <div>
                {{ $message }}
                </div>
                @enderror

                <label for="lyrics">
                {{ __('Lyrics') }}
                </label>
                <input type="text" name="lyrics" id="lyrics">
                @error('lyrics')
                <div>
                {{ $message }}
                </div>
                @enderror

                <label for="path">
                {{ __('Path') }}
                </label>
                <input type="file" name="path" id="path" >
                
                @error('path')
                <div>
                {{ $message }}
                </div>
                @enderror

                <label for="mtime">
                {{ __('mtime') }}
                </label>
                <input type="number" name="mtime" id="mtime">
                @error('mtime')
                <div>
                {{ $message }}
                </div>
                @enderror

                <button type="submit">
                {{ __('Register') }}
                </button>
                </form>
            
            </div>
            
        </div>
        
    </div>
</div>
</x-app-layout>