<x-layout>

    <div class="w-screen h-screen flex flex-col items-center justify-center">
        <h1 class="text-xl">{{ __('admin.sure') }} <span class="text-2xl text-red-700">{{ $quote->quote }}</span>?</h1>

        <form method='POST' class="pt-0"
            action='{{ route('quote.delete', ['quote' => $quote->id, 'lang' => app()->getLocale()]) }}'
            enctype="multipart/form-data" class='mt-10 flex items-center flex-col'>
            @csrf
            @method('delete')
            <a class="text-xl mr-7" href="{{ route('admin', ['lang' => app()->getLocale()]) }}">{{__('admin.go-back')}}</a>
            <button type="submit" class="text-3xl mt-8 text-red-600">{{ __('admin.delete') }}</button>
        </form>

    </div>

</x-layout>
