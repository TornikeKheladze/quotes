<x-layout>
    <section class="px-6 py-8">
        <h1 class="text-xl font-bold mb-4 text-center">Add new movie quote</h1>

        <form method='POST' action='{{route('admin')}}/quote' enctype="multipart/form-data" class='mt-10 flex items-center flex-col'>
            @csrf

            <div class="mb-6 w-full">
                <label for="category_id" class="block mb-2 uppercase font-bold text-xs text-white">
                    Movies
                </label>
                <select name="movie_id" id="movie_id">
                    @foreach (App\Models\Movie::all() as $movie)
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
                <label for="quote" class="block mb-2 uppercase font-bold text-xs text-white">
                    quote
                </label>
                <input class="border border-gray-400 p-2 w-full" type="text" name="quote" id="quote"
                    value="{{ old('quote') }}" required />
                @error('quote')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            <div class="mb-6 w-full">
                <label for="thumbnail" class="block mb-2 uppercase font-bold text-xs text-white">
                    thumbnail
                </label>
                <input class="border border-gray-400 p-2 w-full" type="file" name="thumbnail" id="thumbnail"
                    value="{{ old('thumbnail') }}" />
                @error('thumbnail')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>





            <button type="submit">Submit</button>
        </form>
    </section>

</x-layout>
