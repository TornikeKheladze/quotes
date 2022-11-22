<x-layout>

    <h1 class="text-3xl text-white mb-4">
        Admin
    </h1>

    <a href="{{ route('quote.show.create', ['lang' => app()->getLocale()]) }}"
        class="text-2xl text-white underline mb-6">{{ __('admin.quote') }}</a>

    <a href="{{ route('quote.show.all', ['lang' => app()->getLocale()]) }}"
        class="text-xl underline mb-6 text-white">{{ __('admin.all-quotes') }}</a>

    <div class="flex flex-col items-center gap-3 w-full">
        @foreach ($movies as $movie)
            <div class="bg-white rounded-xl h-10 flex items-center justify-between w-1/2">
                <a class="ml-4"
                    href="{{ route('admin.movie', ['movie' => $movie->slug, 'lang' => app()->getLocale()]) }}">
                    {{ $movie->name }}
                </a>
                <div class="mr-8 ml-5 flex">

                    <a class="text-gray-600 mr-4"
                        href="{{ route('movie.show.edit', ['movie' => $movie->id, 'lang' => app()->getLocale()]) }}">{{ __('admin.edit') }}</a>
                    <a class="text-red-600 self-start"
                        href="{{ route('movie.show.delete', ['movie' => $movie->id, 'lang' => app()->getLocale()]) }}">{{ __('admin.delete') }}</a>

                </div>
            </div>
        @endforeach

        <a href="{{ route('movie.show.create', ['lang' => app()->getLocale()]) }}"
            class="bg-gray-300 w-1/4 rounded-xl text-center">{{ __('admin.movie') }}</a>

    </div>

</x-layout>
