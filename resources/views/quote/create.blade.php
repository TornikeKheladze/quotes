<x-layout>
    <section class="px-6 py-8">
        <h1 class="text-xl font-bold mb-4 text-center">{{ __('admin.quote') }}</h1>

        <form method='POST' action='{{ route('store_quote', ['lang' => app()->getLocale()]) }}' enctype="multipart/form-data"
            class='mt-10 flex items-center flex-col'>
            @csrf

            <div class="mb-6 w-full">
                <label for="category_id" class="block mb-2 uppercase font-bold text-xs text-white">
                    {{ __('admin.movies') }}
                </label>
                <select name="movie_id" id="movie_id">
                    @foreach ($movies as $movie)
                        <option value={{ $movie->id }}>{{ $movie->name }}</option>
                    @endforeach
                </select>

                @error('movie_id')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            <div class="mb-6 w-full">
                <label for="quote_en" class="block mb-2 uppercase font-bold text-xs text-white">
                    {{ __('admin.movie-name') }} ({{ __('admin.eng') }})
                </label>
                <input class="border border-gray-400 p-2 w-full" type="text" name="quote_en" id="quote_en"
                    value="{{ old('quote_en') }}" required />
                @error('quote_en')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-6 w-full">
                <label for="quote_ka" class="block mb-2 uppercase font-bold text-xs text-white">
                    {{ __('admin.movie-name') }} ({{ __('admin.geo') }})
                </label>
                <input class="border border-gray-400 p-2 w-full" type="text" name="quote_ka" id="quote_ka"
                    value="{{ old('quote_ka') }}" required />
                @error('quote_ka')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            <div class="mb-6 w-full">
                <label for="thumbnail" class="block mb-2 uppercase font-bold text-xs text-white">
                    {{ __('admin.photo') }}
                </label>
                <input class="border border-gray-400 p-2 w-full" type="file" name="thumbnail" id="thumbnail"
                    value="{{ old('thumbnail') }}" />
                @error('thumbnail')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>



            <button type="submit">{{ __('admin.submit') }}</button>
        </form>
    </section>

</x-layout>
