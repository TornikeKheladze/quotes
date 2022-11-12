<x-layout>
    <section class="px-6 py-8">
        <h1 class="text-xl font-bold mb-4 text-center">Edit Movie</h1>

        <form method='POST' action='/admin/movie/{{ $movie->id }}' enctype="multipart/form-data"
            class='mt-10 flex items-center flex-col'>
            @csrf
            @method('patch')

            <div class="mb-6 w-full">
                <label for="name" class="block mb-2 uppercase font-bold text-xs text-white">
                    movie name
                </label>
                <input class="border border-gray-400 p-2 w-full" type="text" name="name" id="name"
                    value="{{ old('name', $movie->name) }}" required />
                @error('name')
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


            <button type="submit">Edit</button>
        </form>
    </section>

</x-layout>
