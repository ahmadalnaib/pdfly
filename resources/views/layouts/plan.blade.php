<div class="max-w-7xl mx-auto">
  <div class="flex flex-wrap items-center">
    <div class="w-full lg:w-1/4 mb-8 lg:mb-0">
        <div class="w-full p-1.5 bg-gradient-to-b rounded-xl">
            <div class="px-12 py-12 bg-gray-900 bg-opacity-90 border border-gray-700 rounded-xl">
                <div class="pb-8 mb-14 border-b text-center border-gray-700">
                    <div class="px-3">
                        <h3 class="text-4xl text-white font-bold">1 رصيد </h3>
                    </div>
                </div>
                <ul class="text-lg text-white border-b border-gray-700 pb-12">
                    <li class="flex items-center mb-5">
                        <!-- SVG content -->
                        <span>حد تحميل الملفات 1</span>
                    </li>
                    <li class="flex items-center mb-5">
                        <!-- SVG content -->
                        <span> الحد الأقصى للأسئلة  محدود</span>
                    </li>
                    <li class="flex items-center mb-5">
                        <!-- SVG content -->
                        <span> الحد الأقصى لحجم الملف 5MB    </span>
                    </li>
                    <li class="flex items-center mb-5">
                        <!-- SVG content -->
                        <span>         </span>
                    </li>
                    <li class="flex items-center mb-5">
                        <!-- SVG content -->
                        <span>         </span>
                    </li>
                    <li class="flex items-center mb-5">
                        <!-- SVG content -->
                        <span>         </span>
                    </li>
                    <!-- Add more features here -->
                </ul>
                <div class="flex text-white justify-center py-8 space-x-3 items-center w-full font-mono">
                    <span class="text-4xl">مجانا</span>
                </div>
                <div class="text-center">
                    <a href="{{ route('register') }}" class="inline-block w-full rounded-md mb-2 md:mb-0 px-8 py-4 font-medium leading-normal bg-blue-500 hover:bg-blue-600 text-white transition duration-200 text-center">
                        سجل الان
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    @foreach ($plans as $plan)
                  <!-- Team Plan -->
                  <div class="w-full lg:w-1/4 mb-8 lg:mb-0">
                      <div class="w-full p-1.5 bg-gradient-to-b {{ $plan->price === 3 ? 'bg-gradient-to-r from-blue-600 via-blue-500 to-blue-600' : '' }} rounded-xl">
                        @if($plan->price === 3)
                          <p class="text-center w-full pb-3 py-1.5 leading-tight font-bold text-white uppercase">الأكثر شعبية</p>
                          @endif
                          <div class="px-12 py-12 bg-gray-900 bg-opacity-90 border border-gray-700 rounded-xl">
                              <div class="pb-8 mb-14 border-b text-center border-gray-700">
                                  <div class="px-3">
                                      <h3 class="text-4xl text-white font-bold">{{$plan->credits}} رصيد</h3>
                                      {{-- <p class="text-gray-300 mt-3">تعاون متقدم للأفراد والشركات متوسطة الحجم</p> --}}
                                  </div>
                              </div>
                              <ul class="text-lg text-white border-b border-gray-700 pb-12">
                                  <li class="flex items-center mb-5">
                                      <!-- SVG content -->
                                      <span> حد تحميل الملفات  {{$plan->credits}}  </span>
                                  </li>
                                  <li class="flex items-center mb-5">
                                      <!-- SVG content -->
                                      <span> الحد الأقصى للأسئلة غير محدود</span>
                                  </li>
                                  <li class="flex items-center mb-5">
                                      <!-- SVG content -->
                                      <span>الحد الأقصى لحجم الملف 10MB </span>
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