<x-layout>
    <x-header />
    <a href="{{ route('quote.show.create', ['lang' => app()->getLocale()]) }}"
        class="text-2xl text-white underline mb-6">{{ __('admin.quote') }}</a>
    <a class="text-2xl text-white underline"
        href="{{ route('admin', ['lang' => app()->getLocale()]) }}">{{ __('admin.go-back') }}</a>
    <div class="flex justify-center gap-4 flex-col w-1/2">
        @foreach ($movies as $movie)
            @foreach ($movie->quotes as $quote)
                <div class="border border-black bg-white rounded-xl">
                    <h1 class="text-xl">{{ $movie->name }}</h1>
                    <div class="flex justify-between self-start w-full items-center ">
                        <img src="/storage/{{ $quote->thumbnail }}" class="w-20 rounded-xl" />

                        <span class="ml-4">
                            {{ $quote->quote }}
                        </span>
                        <div class="mr-4 flex items-start">
                            <a class="text-gray-600 mr-4"
                                href="{{ route('quote.show.edit', ['quote' => $quote->id, 'lang' => app()->getLocale()]) }}">{{ __('admin.edit') }}</a>

                            <a href="{{ route('quote.show.delete', ['quote' => $quote->id, 'lang' => app()->getLocale()]) }}"
                                class="text-red-600 self-start">{{ __('admin.delete') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach

    </div>

</x-layout>
