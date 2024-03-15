<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'PDFLY.ai') }}</title>
        <meta property="og:title" content="pdfly.ai - استفسر من الذكاء الاصطناعي عن ملفات PDF" />
<meta property="og:description" content="pdfly.ai هي أداة متقدمة تمكنك من رفع ملفات PDF والاستفسار مباشرة من الذكاء الاصطناعي للحصول على معلومات محددة دون الحاجة إلى قراءة الملف كاملاً." />
<meta property="og:type" content="website" />
<meta property="og:url" content="https://www.pdfly.ai" />
<meta property="og:image" content="{{ asset('fav/android-chrome-512x512') }}" />
<meta name="description" content="استخدم pdfly.ai لاستخراج المعلومات من ملفات PDF بسهولة عبر الذكاء الاصطناعي. رفع، استفسر، واحصل على الإجابات بسرعة." />
<meta name="keywords" content="PDF, ذكاء اصطناعي, استخراج بيانات, معالجة ملفات PDF, استفسارات PDF" />
        <!-- Fonts --> <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('fav/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('fav/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('fav/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ url('fav/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ url('fav/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div class="mt-10">
                <a href="/">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                </a>
            </div>

            <div class="w-full px-8 py-16 bg-gray-100 xl:px-8 ">
                <div class="max-w-5xl mx-auto">
                {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
