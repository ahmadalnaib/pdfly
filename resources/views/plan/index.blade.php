<x-app-layout>
  <x-slot name="header test">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        ترقية حسابك
      </h2>
  </x-slot>
  <section class="py-12 md:py-16 lg:py-16 2xl:py-20 bg-gray-900 mt-20">
    <div class="max-w-7xl mx-auto px-10">
        <div class="mb-12 xl:mb-20 lg:text-center px-4">
            <p class="mb-2 text-blue-500 uppercase font-medium">خطط الأسعار الخاصة بنا</p>
            <h2 class="mb-4 text-4xl sm:text-5xl xl:text-6xl text-white font-bold">اختر الخطة التي تناسبك.</h2>
            <p class="text-base sm:text-lg text-gray-300 xl:text-2xl">  
              فقط باستثمار بسيط، يمكنك زيادة إنتاجيتك عشر مرات وتوفير ساعات في اليوم من خلال قراءة ملفات PDF.
          </p>
        </div>
      @include('layouts.plan')
    </div>
</section>

  
</x-app-layout>