<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Artists') }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
            @if( $artists->count())

                <div class="mb-4">
                        {{ $artists->links() }}
                    </div>

                <table>
                <thead>
                <tr>
                <th>ID</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Image') }}</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($artists as $artist)
                <tr>
                <td>{{ $artist->id }}</td>
                <td>{{ $artist->name }}</td>
                <td><image src="{{ $artist->getUrlImage() }}" ></image></td>
                <td>
                <a href="{{ route('artists.show', ['artist' => $artist])}}">
                {{ __('Show') }}
                </a>
                </td>
                <td>
                <a href="{{ route('artists.edit', ['artist' => $artist])}}">
                {{ __('Update') }}
                </a>
                </td>
                <td>
                <form action="{{ route('artists.destroy', ['artist' =>
                $artist]) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit">
                {{ __('Delete') }}
                </button>
                </form>
                </td>
                </tr>
                @endforeach
                <tr>
                <td colspan="3">&nbsp;</td>
                <td>
                <a href="{{ route('artists.create') }}">
                {{ __('Insert') }}
                </a>
                </td>
                </tr>
                </tbody>
                </table>
            <div>
            {{ $artists->links() }}
        </div>
        @endif
    </div>
</div>
</x-app-layout>