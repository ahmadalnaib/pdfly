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
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-wrap items-center">
              @foreach ($plans as $plan)
                            <!-- Team Plan -->
                            <div class="w-full lg:w-1/3 mb-8 lg:mb-0">
                                <div class="w-full p-1.5 bg-gradient-to-b {{ $plan->name === '200crereaid' ? 'bg-gradient-to-r from-blue-600 via-blue-500 to-blue-600' : '' }} rounded-xl">
                                  @if($plan->name === '200crereaid')
                                    <p class="text-center w-full pb-3 py-1.5 leading-tight font-bold text-white uppercase">الأكثر شعبية</p>
                                    @endif
                                    <div class="px-12 py-12 bg-gray-900 bg-opacity-90 border border-gray-700 rounded-xl">
                                        <div class="pb-8 mb-14 border-b text-center border-gray-700">
                                            <div class="px-3">
                                                <h3 class="text-4xl text-white font-bold">{{$plan->credits}} رصيد</h3>
                                                <p class="text-gray-300 mt-3">تعاون متقدم للأفراد والشركات متوسطة الحجم</p>
                                            </div>
                                        </div>
                                        <ul class="text-lg text-white border-b border-gray-700 pb-12">
                                            <li class="flex items-center mb-5">
                                                <!-- SVG content -->
                                                <span>مستودعات خاصة غير محدودة</span>
                                            </li>
                                            <li class="flex items-center mb-5">
                                                <!-- SVG content -->
                                                <span>حتى 10 قواعد بيانات</span>
                                            </li>
                                            <li class="flex items-center mb-5">
                                                <!-- SVG content -->
                                                <span>100 جيجابايت من التخزين</span>
                                            </li>
                                            <li class="flex items-center mb-5">
                                                <!-- SVG content -->
                                                <span>وصول مبكر لواجهة برمجة التطبيقات API</span>
                                            </li>
                                            <li class="flex items-center">
                                                <!-- SVG content -->
                                                <span>دعم على مدار الساعة طوال أيام الأسبوع</span>
                                            </li>
                                        </ul>
                                        <div class="flex text-white justify-center py-8 space-x-3 items-center w-full font-mono">
                                            <span class="text-4xl">${{$plan->price}} </span>
                                          
                                        </div>
                                        <div class="text-center">
                                          <form action="{{ route('checkout.index', $plan->slug) }}" method="POST">
                                            @csrf
                                            <button class="inline-block w-full rounded-md mb-2 md:mb-0 px-8 py-4 font-medium leading-normal bg-blue-500  hover:bg-blue-600 text-white transition duration-200">اشتري </button>
                                          </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endforeach
            
                 
            
            </div>
        </div>
    </div>
</section>

  
</x-app-layout>