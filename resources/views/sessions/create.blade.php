<x-layout>

    <section class="px-6 py-8 w-1/3">
        <main class='max-w-lg mx-auto mt-10 bg-gray-100 p-6 rounded-xl border-gray-300 '>
            <h1 class="text-center font-bold text-xl">{{__('admin.login')}}</h1>
            <form method='POST' action='/sessions' class='mt-10'>
                @csrf

                <div class="mb-6">
                    <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                       {{__('admin.email')}}
                    </label>
                    <input class="border border-gray-400 p-2 w-full" type="email" name="email" id="email"
                        required value="{{ old('email') }}" />
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">
                            {{ __('validation.login_error')}}
                        </p>
                    @enderror
                </div>


                <div class="mb-6">
                    <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        {{__('admin.password')}}
                    </label>
                    <input class="border border-gray-400 p-2 w-full" type="password" name="password" id="password"
                        required />
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">
                            {{ __('validation.password_error') }}
                        </p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                        {{__('admin.login')}}</button>

                </div>

            </form>
        </main>
    </section>
</x-layout>
