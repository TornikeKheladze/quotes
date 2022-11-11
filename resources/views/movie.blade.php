<x-layout>
    <h1 class="text-3xl text-white w-1/2 mt-8 mb-20" >{{ $movie->name }}</h1>
    @foreach ($movie->quotes as $quote)
        <div class="flex flex-col gap-5 items-center justify-around w-2/4 bg-white rounded-xl mb-16 ">
            <x-quote-card :quote='$quote' />
        </div>
    @endforeach
</x-layout>
