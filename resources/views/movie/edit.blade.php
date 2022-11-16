<x-layout>
    <section class="px-6 py-8">
        <h1 class="text-xl font-bold mb-4 text-center"> {{ __('admin.edit-movie') }} </h1>
   
        <form method='POST' action='{{ route('edit_movie', ['movie' => $movie->id]) }}' enctype="multipart/form-data"
            class='mt-10 flex items-center flex-col'>
            @csrf
            @method('patch')

            <div class="mb-6 w-full">
                <label for="name_en" class="block mb-2 uppercase font-bold text-xs text-white">
                    {{ __('admin.movie-name') }} ({{ __('admin.eng') }})
                </label>
                <input class="border border-gray-400 p-2 w-full" type="text" name="name_en" id="name_en"
                    value="{{ old('name_en', $movie->getTranslation('name', 'en')) }}" required />
                @error('name_en')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-6 w-full">
                <label for="name_ka" class="block mb-2 uppercase font-bold text-xs text-white">
                    {{ __('admin.movie-name') }} ({{ __('admin.geo') }})
                </label>
                <input class="border border-gray-400 p-2 w-full" type="text" name="name_ka" id="name_ka"
                    value="{{ old('name_ka', $movie->getTranslation('name', 'ka')) }}" required />
                @error('name_ka')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            <div class="mb-6 w-full">
                <label for="slug" class="block mb-2 uppercase font-bold text-xs text-white">
                    slug
                </label>
                <input class="border border-gray-400 p-2 w-full" type="text" name="slug" id="slug"
                    value="{{ old('slug', $movie->slug) }}" required />
                @error('slug')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            <button type="submit">{{ __('admin.edit') }}</button>
        </form>
    </section>

</x-layout>
