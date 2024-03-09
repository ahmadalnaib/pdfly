<x-guest-layout>
    <section class="w-full bg-white py-10" >
        <div class="mx-auto max-w-7xl">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                <div class="relative w-full bg-cover bg-gradient-to-r from-white via-white to-white p-10 lg:p-20">
                    <div class="flex flex-col items-center justify-center w-full h-full">
                        <div class="flex flex-col items-start space-y-8 tracking-tight lg:max-w-3xl">
                            <div class="relative">
                                <p class="mb-2 font-medium text-gray-700 uppercase text-2xl">ابتكارات AI لتحسين ملفات PDF</p>
                                <h2 class="text-6xl font-bold text-gray-900 xl:text-7xl">مزايا تمكنك من العمل بذكاء أعمق مع ملفات PDF</h2>
                            </div>
                            <p class="text-3xl text-gray-700">قمنا بتطوير نهج مبتكر يتيح لك استخدام الذكاء الاصطناعي لزيادة إنتاجية عملك مع ملفات PDF.</p>
                        </div>
                    </div>
                </div>
                <div class="w-full bg-white p-10 lg:p-20">
                    <div class="flex flex-col items-start justify-start w-full h-full">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <!-- Name -->
                            <div class="mb-4">
                                <x-input-label for="name" :value="__('auth.Name')" />
                                <x-text-input id="name" class="block mt-1 w-full text-lg" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <!-- Email Address -->
                            <div class="mb-4">
                                <x-input-label for="email" :value="__('auth.E-Mail')" />
                                <x-text-input id="email" class="block mt-1 w-full text-lg" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <!-- Password -->
                            <div class="mb-4">
                                <x-input-label for="password" :value="__('auth.Password')" />
                                <x-text-input id="password" class="block mt-1 w-full text-lg"
                                                type="password"
                                                name="password"
                                                required autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <!-- Confirm Password -->
                            <div class="mb-4">
                                <x-input-label for="password_confirmation" :value="__('auth.Confirm Password')" />
                                <x-text-input id="password_confirmation" class="block mt-1 w-full text-lg"
                                                type="password"
                                                name="password_confirmation" required autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                            <div class="flex items-center justify-end mt-4">
                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                                    {{ __('auth.Already registered?') }}
                                </a>
                                <x-primary-button class="ms-4">
                                    {{ __('auth.Register') }}
                                </x-primary-button>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>