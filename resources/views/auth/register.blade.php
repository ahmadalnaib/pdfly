<x-guest-layout>
    {{-- --}}

    <section class="w-full bg-white " >

        <div class="mx-auto max-w-7xl">
            <div class="flex flex-col lg:flex-row">
                <div class="relative w-full bg-cover lg:w-6/12 xl:w-7/12 bg-gradient-to-r from-white via-white to-gray-100">
                    <div class="relative flex flex-col items-center justify-center w-full h-full px-10 my-20 lg:px-16 lg:my-0">
                        <div class="flex flex-col items-start space-y-8 tracking-tight lg:max-w-3xl">
                            <div class="relative">
                                <p class="mb-2 font-medium text-gray-700 uppercase">ابتكارات AI لتحسين ملفات PDF</p>


                                <h2 class="text-5xl font-bold text-gray-900 xl:text-6xl">مزايا تمكنك من العمل بذكاء أعمق مع ملفات PDF</h2>
                            </div>
                            <p class="text-2xl text-gray-700">قمنا بتطوير نهج مبتكر يتيح لك استخدام الذكاء الاصطناعي لزيادة إنتاجية عملك مع ملفات PDF.</p>
                      
                            </div>
                            
                    </div>
                </div>
    
                <div class="w-full bg-white lg:w-6/12 xl:w-5/12">
                    <div class="flex flex-col items-start justify-start w-full h-full p-10 lg:p-16 xl:p-24">
                    
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                    
                            <!-- Name -->
                            <div>
                                <x-input-label for="name" :value="__('auth.Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                    
                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-input-label for="email" :value="__('auth.E-Mail')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                    
                            <!-- Password -->
                            <div class="mt-4">
                                <x-input-label for="password" :value="__('auth.Password')" />
                    
                                <x-text-input id="password" class="block mt-1 w-full"
                                                type="password"
                                                name="password"
                                                required autocomplete="new-password" />
                    
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                    
                            <!-- Confirm Password -->
                            <div class="mt-4">
                                <x-input-label for="password_confirmation" :value="__('auth.Confirm Password')" />
                    
                                <x-text-input id="password_confirmation" class="block mt-1 w-full"
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
