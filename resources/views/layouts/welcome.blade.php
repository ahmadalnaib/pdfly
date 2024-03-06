<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        html{
  scroll-behavior: smooth;
}
    </style>
</head>

<body>
    <div>
        <nav x-data="{ mobile: false }" dir="rtl"
            class="relative pt-6 mx-auto max-w-7xl md:flex md:justify-between md:items-center md:pb-6">
            <div class="relative z-20 flex items-center justify-between">
                <div>
                    <a href="{{ route('welcome') }}"
                        class="text-xl font-bold text-gray-800 hover:text-gray-700 md:text-2xl">
                        <img height="100px" width="100px" src="{{url('images/logo-60.png')}}" alt="">
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div @click="mobile = !mobile" class="md:hidden">
                    <button type="button"
                        class="text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600"
                        aria-label="toggle menu">
                        <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                            <path fill-rule="evenodd"
                                d="M4 5h16a1 1 0 010 2H4a1 1 0 010-2zm0 6h16a1 1 0 010 2H4a1 1 0 010-2zm0 6h16a1 1 0 010 2H4a1 1 0 010-2z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
            <div :class="{ 'block': mobile, 'hidden': !mobile }"
                class="md:flex items-center justify-center w-full font-semibold select-none lg:absolute hidden">
                <div
                    class="flex flex-col md:flex-row justify-center w-full mt-4 md:mt-0 space-y-2 md:space-y-0 space-x-reverse md:space-x-8 lg:space-x-12 xl:space-x-16">
                    <a class="py-3 text-gray-800 hover:text-gray-700 hover:underline ml-8 md:ml-4 lg:ml-8 xl:ml-16"
                        href="#features">المزايا</a>
                    <a class="py-3  text-gray-800 hover:text-gray-700 hover:underline" href="#testimonials">اراء العملاء</a>
                    <a class="py-3 text-gray-800 hover:text-gray-700 hover:underline" href="#pricing">الباقات</a>

                </div>
            </div>

            <div :class="{ 'flex': mobile, 'hidden': !mobile }"
                class="md:flex relative z-20 flex-col md:flex-row justify-center pl-5 mt-4 md:mt-0 space-y-8 md:space-y-0 md:items-center md:space-x-6 hidden">
                @if (auth()->check())
                    <a href="{{route('pdf.index')}}"
                        class="flex-shrink-0 font-semibold text-gray-900 hover:underline ml-4 md:ml-4 lg:ml-4 xl:ml-4">لوحة
                        التحكم</a>
                @else
                    <a href="{{ route('login') }}"
                        class="flex-shrink-0 font-semibold text-gray-900 hover:underline ml-4 md:ml-4 lg:ml-4 xl:ml-4">الدخول</a>
                    <a href="{{ route('register') }}"
                        class="flex-shrink-0 w-auto text-base font-semibold leading-5 text-left text-gray-800 capitalize bg-transparent md:text-sm md:py-3 md:px-8 md:font-medium md:text-center md:text-white md:bg-gray-900 md:rounded">
                        التسجيل
                    </a>
                @endif
            </div>
        </nav>


        <div>
            {{ $slot }}
        </div>
    </div>
</body>

</html>
