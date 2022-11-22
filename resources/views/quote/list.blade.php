<x-layout>
    <div class="flex justify-center gap-4 flex-col w-1/2">
        <h1 class="text-3xl text-white">
            {{ $movie->name }}
        </h1>
        @foreach ($movie->quotes as $quote)
            <div class="flex justify-between self-start w-full items-center bg-white rounded-xl">
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
                    </form>
                    <a href="{{ route('quote.show.delete', ['quote' => $quote->id, 'lang' => app()->getLocale()]) }}"
                        class="text-red-600 self-start">{{ __('admin.delete') }}</a>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>
