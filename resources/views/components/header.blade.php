<div class="flex gap-4 mr-6 w-full justify-end mt-3">

    @auth
        <a class="ml-8" href="{{ route('home', ['lang' => app()->getLocale()]) }}">{{ __('admin.home') }}</a>
        <h1>{{ __('admin.welcome') }} {{ auth()->user()->name }}</h1>
        <form method='POST' action='{{ route('logout', ['lang' => app()->getLocale()]) }}' class=''>
            @csrf
            <button type='submit'>{{ __('admin.logout') }}</button>
        </form>
    @endauth
</div>
