<x-layout>

    <h1 class="text-3xl text-white mb-4">
        you are admin you can:
    </h1>
    <a href="admin/quote/create" class="text-2xl text-white underline mb-6">Add new quote to movie</a>
    <a href="admin/movie/create" class="text-2xl text-white underline mb-6">Add new movie </a>

    <div class="flex flex-col items-center gap-3 w-full">
        @foreach ($movies as $movie)
            <div class="bg-white rounded-xl h-10 flex items-center justify-between w-1/2">
                <a class="ml-4" href="admin/movie/{{ $movie->slug }}">
                    {{ $movie->name }}
                </a>
                <div class="mr-8 ml-5 flex">
                    <a class="text-gray-600 mr-4" href="admin/movie/{{ $movie->id }}/edit">edit</a>

                    <form method='POST' class="pt-0" action='/admin/movie/{{ $movie->id }}'
                        enctype="multipart/form-data" class='mt-10 flex items-center flex-col'>
                        @csrf
                        @method('delete')
                        <button type="submit" class="text-red-600 self-start">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

</x-layout>
