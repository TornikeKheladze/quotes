<!doctype html>

<title>Movie Quotes</title>

<link rel="icon" href="{{ URL::asset('movieicon.png') }}" type="image/x-icon"/>

@vite('resources/css/app.css')

<body class="flex flex-col items-center h-screen bg-gradient-radial from-gray-889 to-gray-888">
    @php
        $name = url()->current();
        $lang = app()->getLocale();
        $geo = Str::replace($lang, 'ka', $name);
        $eng = Str::replace($lang, 'en', $name);
    @endphp

    <div class="ml-10 fixed h-full flex flex-col justify-center gap-3 self-start w-10">
        <a class="rounded-full text-white text-center pt-2 border-2 h-10 border-white {{ $lang == 'en' ? 'bg-white text-black' : '' }}"
            href="{{ $eng }}">en</a>
        <a class="rounded-full text-white text-center pt-2 border-2 h-10 border-white {{ $lang == 'ka' ? 'bg-white text-black' : '' }}"
            href="{{ $geo }}">ka</a>
    </div>



    {{ $slot }}
</body>
