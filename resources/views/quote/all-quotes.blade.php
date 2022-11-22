<x-layout>
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

                            <form method='POST' class="pt-0"
                                action='{{ route('quote.delete', ['quote' => $quote->id, 'lang' => app()->getLocale()]) }}'
                                enctype="multipart/form-data" class='mt-10 flex items-center flex-col'>
                                @csrf
                                @method('delete')
                                <button type="submit" class="text-red-600 self-start">{{ __('admin.delete') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach

    </div>
</x-layout>
