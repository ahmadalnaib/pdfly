<x-guest-layout>
    <section >
        <div class="max-w-5xl mx-auto">
            <div class="flex flex-col items-center md:flex-row">
    
                <div class="w-full space-y-5 md:w-3/5 md:pr-16">
                    <p class="font-medium text-blue-500 uppercase" data-primary="blue-500">ابتكارات PDF الذكية</p>
                    <h2 class="text-2xl font-extrabold leading-none text-black sm:text-3xl md:text-5xl">
                        إعادة تعريف التفاعل مع المستندات.
                    </h2>
                    <p class="text-xl text-gray-600 md:pr-16">اكتشف كيف يمكن لتقنيات الذكاء الاصطناعي أن تحول تجربتك مع ملفات PDF. نحن في طليعة ثورة تجربة المستخدم والتعامل مع المستندات.</p>
                    
                </div>
    
                <div class="w-full mt-16 md:mt-0 md:w-2/5">
                    <div class="relative z-10 h-auto p-8 py-10 overflow-hidden bg-white border-b-2 border-gray-300 rounded-lg shadow-2xl px-7" data-rounded="rounded-lg" data-rounded-max="rounded-full">
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
                                    <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('auth.Remember me') }}</span>
                                </label>
                            </div>
                    
                            <div class="flex items-center justify-end mt-4">
                                @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                        {{ __('auth.Forgot your password?') }}
                                    </a>
                                @endif
                    
                                <x-primary-button class="ms-3">
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
