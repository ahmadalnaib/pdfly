<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'PDFLY') }}</title>

        <meta property="og:title" content="pdfly - استفسر من الذكاء الاصطناعي عن ملفات PDF" />

<meta property="og:type" content="website" />
<meta property="og:url" content="https://www.pdfly.ai" />
<meta property="og:image" content="{{ asset('fav/android-chrome-512x512') }}" />
<meta name="description" content="استخدم pdfly لاستخراج المعلومات من ملفات PDF بسهولة عبر الذكاء الاصطناعي. رفع، استفسر، واحصل على الإجابات بسرعة." />
<meta name="keywords" content="PDF, ذكاء اصطناعي, استخراج بيانات, معالجة ملفات PDF, استفسارات PDF" />

        <link rel="apple-touch-icon" sizes="180x180" href="{{ url('fav/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ url('fav/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ url('fav/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ url('fav/site.webmanifest') }}">
        <link rel="mask-icon" href="{{ url('fav/safari-pinned-tab.svg') }}" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
