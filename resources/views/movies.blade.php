<x-layout>
    @auth
        <a class="text-3xl" href="{{ route('admin', ['lang' => app()->getLocale()]) }}">Admin Controls</a>
    @endauth
    <div class="flex flex-col items-center w-2/3 h-screen justify-center ">

        @if ($quoteWithMovie->count())
            <img class="rounded-xl h-1/3" src="/storage/{{ $quoteWithMovie->thumbnail }}" alt="" />

            <h1 class="text-white text-3xl mt-8 mb-16">{{ $quoteWithMovie->quote }}</h1>
            <a class="underline text-white text-4xl"
                href="{{ route('show.movie', ['movie' => $quoteWithMovie->movie->slug, 'lang' => app()->getLocale()]) }}">{{ $quoteWithMovie->movie->name }}</a>
        @else
            <p class="text-4xl text-white">No quotes yet
            <p>
        @endif
    </div>
</x-layout>
