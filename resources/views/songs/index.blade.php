<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Songs') }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
            @if( $songs->count())

                <div class="mb-4">
                        {{ $songs->links() }}
                    </div>

                <table>
                <thead>
                <tr>
                <th>ID</th>
                <th>{{ __('Title') }}</th>
                <th>{{ __('Length') }}</th>
                <th>{{ __('Track') }}</th>
                <th>{{ __('Disc') }}</th>
                <th>{{ __('Lyrics') }}</th>
                <th>{{ __('Path') }}</th>
                <th>{{ __('Mtime') }}</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($songs as $song)
                <tr>
                <td>{{ $song->id }}</td>
                <td>{{ $song->title }}</td>
                <td>{{ $song->length }}</td>
                <td>{{ $song->track }}</td>
                <td>{{ $song->disc }}</td>
                <td>{{ $song->lyrics }}</td>
                <td><audio controls src="{{ $song->getUrlPath() }}" controls></audio controls></td>
                <td>{{ $song->mtime }}</td>
                <td>
                <a href="{{ route('songs.edit', ['song' => $song])}}">
                {{ __('Update') }}
                </a>
                </td>
                <td>
                <form action="{{ route('songs.destroy', ['song' =>
                $song]) }}" method="post">
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
                <a href="{{ route('songs.create') }}">
                {{ __('Insert') }}
                </a>
                </td>
                </tr>
                </tbody>
                </table>
            <div>
            {{ $songs->links() }}
        </div>
        @endif
    </div>
</div>
</x-app-layout>