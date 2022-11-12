<x-layout>
    <div class="flex flex-col items-center w-2/3 h-screen justify-center ">
        @php($currentQuote = $movie->quotes->random())
        <img class="rounded-xl w-2/4 " src="/storage/{{ $currentQuote->thumbnail }}" alt="" />
        <h1 class="text-white text-3xl mt-8 mb-16">{{ $currentQuote->quote }}</h1>
        <a class="underline text-white text-4xl" href="movie/{{ $movie->slug }}">{{ $movie->name }}</a>
    </div>
</x-layout>
