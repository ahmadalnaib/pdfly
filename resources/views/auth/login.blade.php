<x-guest-layout>
    <section class="bg-gray-100 py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col items-center md:flex-row md:space-x-16">

                <div class="w-full space-y-5 md:w-1/2">
                    <p class="font-semibold text-blue-600 uppercase">ابتكارات PDF الذكية</p>
                    <h2 class="text-3xl font-extrabold leading-none text-black sm:text-4xl md:text-6xl">
                        إعادة تعريف التفاعل مع المستندات.
                    </h2>
                    <p class="text-xl text-gray-700">اكتشف كيف يمكن لتقنيات الذكاء الاصطناعي أن تحول تجربتك مع ملفات PDF. نحن في طليعة ثورة تجربة المستخدم والتعامل مع المستندات.</p>
                </div>

                <div class="w-full mt-10 md:mt-0 md:w-1/2">
                    <div class="bg-white shadow overflow-hidden sm:rounded-lg p-8">
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Address -->
                            <div>
                                <x-input-label for="email" :value="__('auth.E-Mail')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="mt-4">
                                <x-input-label for="password" :value="__('auth.Password')" />

                                <x-text-input id="password" class="block mt-1 w-full"
                                                type="password"
                                                name="password"
                                                required autocomplete="current-password" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Remember Me -->
                            <div class="block mt-4">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-500 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" name="remember">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('auth.Remember me') }}</span>
                                </label>
                            </div>

                            <div class="flex items-center justify-between mt-4">
                                @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                        {{ __('auth.Forgot your password?') }}
                                    </a>
                                @endif

                                <x-primary-button class="ml-3">
                                    {{ __('auth.Log in') }}
                                </x-primary-button>
                            </div>
                        </form> 

                        <p class="w-full mt-4 text-sm text-center text-gray-500">ليس لديك حساب؟ <a href="{{route('register')}}" class="text-blue-500 underline">سجل هنا</a></p>
                    </div>
                </div>

            </div>
        </div>
    </section>
</x-guest-layout>