<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Edit Albums') }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{ route('albums.update', ['album' =>
                $album]) }}" enctype="multipart/form-data" method="post">

                @csrf
                @method('PUT')


                <label for="name">
                {{ __('Name') }}
                </label>
                <input type="text" name="name" id="name" value="{{ $album->name }}">
                @error('name')
                <div>
                {{ $message }}
                </div>
                @enderror

                <label for="cover">
                {{ __('Cover') }}
                </label>
                <input type="file" name="cover" id="cover">
                
                @error('cover')
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