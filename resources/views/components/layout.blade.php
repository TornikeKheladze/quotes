<!doctype html>

<title>Movie Quotes</title>
@vite('resources/css/app.css')

<body class="flex flex-col items-center h-screen bg-gradient-radial from-gray-889 to-gray-888">

    <div class="self-end flex gap-4 mr-6">
        @auth
            <h1>welcome {{ auth()->user()->name }}</h1>
            <form method='POST' action='/logout' class=''>
                @csrf
                <button type='submit'>Log out</button>
            </form>
        @else
            <h1><a href="/login">log in</a></h1>
        @endauth
    </div>

    {{ $slot }}
</body>
