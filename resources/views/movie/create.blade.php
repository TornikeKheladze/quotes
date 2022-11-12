<x-layout>
    <section class="px-6 py-8">
        <h1 class="text-xl font-bold mb-4 text-center">Add new movie quote</h1>

        <form method='POST' action='/admin/movie' enctype="multipart/form-data" class='mt-10 flex items-center flex-col'>
            @csrf
            <div class="mb-6 w-full">
                <label for="title" class="block mb-2 uppercase font-bold text-xs text-white">
                   movie title
                </label>
                <input class="border border-gray-400 p-2 w-full" type="text" name="title" id="title"
                    value="{{ old('title') }}" required />
                @error('title')
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
                    value="{{ old('slug') }}" required />
                @error('slug')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            <button type="submit">Submit</button>
        </form>
    </section>

</x-layout>
