<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Edit Songs') }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{ route('songs.update', ['song' =>
                $song]) }}" enctype="multipart/form-data" method="post">

                @csrf
                @method('PUT')


                <label for="title">
                {{ __('Title') }}
                </label>
                <input type="text" name="title" id="title" value="{{ $song->title }}">
                @error('title')
                <div>
                {{ $message }}
                </div>
                @enderror

                <label for="length">
                {{ __('length') }}
                </label>
                <input type="text" name="length" id="length" value="{{ $song->length }}">
                @error('length')
                <div>
                {{ $message }}
                </div>
                @enderror

                <label for="track">
                {{ __('track') }}
                </label>
                <input type="number" name="track" id="track" value="{{ $song->track }}">
                @error('track')
                <div>
                {{ $message }}
                </div>
                @enderror

                <label for="disc">
                {{ __('disc') }}
                </label>
                <input type="number" name="disc" id="disc" value="{{ $song->disc }}">
                @error('disc')
                <div>
                {{ $message }}
                </div>
                @enderror

                <label for="lyrics">
                {{ __('lyrics') }}
                </label>
                <input type="text" name="lyrics" id="lyrics" value="{{ $song->lyrics }}">
                @error('lyrics')
                <div>
                {{ $message }}
                </div>
                @enderror

                <label for="path">
                {{ __('Path') }}
                </label>
                <input type="file" name="path" id="path">
                
                @error('path')
                <div>
                {{ $message }}
                </div>
                @enderror

                <label for="mtime">
                {{ __('mtime') }}
                </label>
                <input type="number" name="mtime" id="mtime" value="{{ $song->mtime }}">
                @error('mtime')
                <div>
                {{ $message }}
                </div>
                @enderror

                <button type="submit">
                {{ __('Update') }}
                </button>
                </form>
            </div>
        </div>
    </div>
</div>
</x-app-layout>