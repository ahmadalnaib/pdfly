<x-welcome-layout>
    
    <section class="w-full px-6 pt-3 overflow-hidden bg-white xl:px-8 ">
        <div class="absolute top-0 left-0 w-full h-3 bg-gradient-to-r from-indigo-600 via-blue-500 to-green-400"
            data-primary="indigo-600"></div>



        <div class="container pt-16 mx-auto text-left md:text-center">
            <div class="relative max-w-4xl mx-auto">
                <h1 class="pb-2 text-4xl font-extrabold text-right text-transparent sm:text-6xl md:text-7xl md:text-center bg-clip-text bg-gradient-to-r from-indigo-600 via-blue-500 to-green-400"
                    data-primary="indigo-600">إدارة المشاريع مع الذكاء الصناعي</h1>
                <p
                    class="mt-8 text-sm text-right text-gray-500 sm:text-base md:text-lg md:max-w-xl md:text-center md:mx-auto">
                    في عصر تسوده التكنولوجيا، يعيد CamelMind تعريف إدارة المشاريع من خلال دمج الذكاء الصناعي لتوفير حلول
                    مبتكرة وفعالة. نحن نسهل عليك مهمة التخطيط، التنفيذ، ومتابعة مشاريعك بكفاءة عالية، مما يضمن تحقيق
                    النجاح المستدام والنمو. اكتشف كيف يمكن لـ CamelMind أن يحول تحديات إدارة المشاريع إلى فرص نجاح
                    استثنائية.
                </p>

                <a href="{{ route('register') }}"
                    class="relative w-full px-12 py-5 mt-8 text-xl font-semibold leading-5 text-center text-white capitalize bg-gray-900 md:w-auto hover:bg-gray-800 focus:outline-none focus:bg-gray-800 md:mx-0 "
                  >
                    ابدأ التجربة المجانية
                </a>
            </div>
            <div
                class="box-content relative w-full h-64 max-w-6xl pb-0 mx-auto mt-16 overflow-hidden rounded-b-none lg:pb-32 md:h-88 lg:h-40 rounded-2xl">
                {{-- <img src="https://cdn.devdojo.com/images/february2021/dash-mock.jpg"
                    class="absolute object-cover object-top w-full h-auto"> --}}
            </div>
        </div>
    </section>
    

    <section class="mt-20" id="features">
        <div x-data="{ activeTab: 1 }" class="flex min-h-screen">
            <!-- Left Side: Dynamic Photo based on active tab -->
            <div class="w-1/2 flex items-center justify-center bg-gray-100">
                <template x-if="activeTab === 1">
                    <img src="https://via.placeholder.com/600/111111" alt="AI Project Manager"
                        class="max-w-full h-auto rounded-lg shadow-lg">
                </template>
                <template x-if="activeTab === 2">
                    <img src="https://via.placeholder.com/600/222222" alt="AI PDF"
                        class="max-w-full h-auto rounded-lg shadow-lg">
                </template>
                <template x-if="activeTab === 3">
                    <img src="https://via.placeholder.com/600/333333" alt="AI Voice"
                        class="max-w-full h-auto rounded-lg shadow-lg">
                </template>
                <template x-if="activeTab === 4">
                    <img src="https://via.placeholder.com/600/444444" alt="AI Photo"
                        class="max-w-full h-auto rounded-lg shadow-lg">
                </template>
            </div>

            <!-- Right Side: Tabs with Title and Subtitle -->
            <div class="w-1/2 bg-gradient-to-tr from-blue-400 via-indigo-700 to-blue-500  text-white flex flex-col items-center justify-center p-10">
                <div class="space-y-8"> <!-- Increased space between tabs -->
                    <div @click="activeTab = 1" :class="{ 'bg-white bg-opacity-25': activeTab === 1 }"
                        class="cursor-pointer p-6 rounded-lg transition-all ease-in-out duration-150">
                        <!-- Increased padding and added transparent white background for active tab -->
                        <h2 class="text-xl font-bold">مدير مشاريع الذكاء الاصطناعي</h2>
                        <p class="text-sm">إدارة المشاريع بكفاءة</p>
                    </div>
                    <div @click="activeTab = 2" :class="{ 'bg-white bg-opacity-25': activeTab === 2 }"
                        class="cursor-pointer p-6 rounded-lg transition-all ease-in-out duration-150">
                        <h2 class="text-xl font-bold">الذكاء الاصطناعي PDF</h2>
                        <p class="text-sm">تحليل ومعالجة المستندات</p>
                    </div>
                    <div @click="activeTab = 3" :class="{ 'bg-white bg-opacity-25': activeTab === 3 }"
                        class="cursor-pointer p-6 rounded-lg transition-all ease-in-out duration-150">
                        <h2 class="text-xl font-bold">الذكاء الاصطناعي الصوتي</h2>
                        <p class="text-sm">تحويل النص إلى كلام</p>
                    </div>
                    <div @click="activeTab = 4" :class="{ 'bg-white bg-opacity-25': activeTab === 4 }"
                        class="cursor-pointer p-6 rounded-lg transition-all ease-in-out duration-150">
                        <h2 class="text-xl font-bold">صور الذكاء الاصطناعي</h2>
                        <p class="text-sm">إنشاء وتعديل الصور</p>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section  class="mt-20" >
        <div x-data="{ activeSectionTab: 1 }" class="min-h-screen bg-white py-20">
            <div class="max-w-7xl mx-auto px-8 sm:px-10 lg:px-12">
              <h2 class="text-center text-5xl font-extrabold text-gray-900 mb-20">تبسيط المهام التجارية اليومية</h2>
              
              <!-- Tabs with Increased Spacing and More Text -->
              <div class="flex justify-center gap-20 mb-20"> <!-- Significantly increased gap -->
                <div @click="activeSectionTab = 1" class="text-center cursor-pointer space-y-6">
                  <img src="https://via.placeholder.com/60" alt="Icon 1" class="mx-auto" style="width: 60px; height: 60px;">
                  <h3 :class="{ 'text-blue-600': activeSectionTab === 1 }" class="text-2xl font-bold text-gray-900">عنوان 1</h3>
                  <p class="text-lg text-gray-500">العنوان الفرعي 1</p>
                  <p class="text-md text-gray-600">هذا نص توضيحي باللغة العربية يمكن استبداله بمحتوى فعلي يتناسب مع الموضوع.</p>
                </div>
                <div @click="activeSectionTab = 2" class="text-center cursor-pointer space-y-6">
                  <img src="https://via.placeholder.com/60" alt="Icon 2" class="mx-auto" style="width: 60px; height: 60px;">
                  <h3 :class="{ 'text-blue-600': activeSectionTab === 2 }" class="text-2xl font-bold text-gray-900">عنوان 2</h3>
                  <p class="text-lg text-gray-500">العنوان الفرعي 2</p>
                  <p class="text-md text-gray-600">محتوى إضافي باللغة العربية لتوفير مزيد من المعلومات والتفاصيل للمستخدم.</p>
                </div>
                <div @click="activeSectionTab = 3" class="text-center cursor-pointer space-y-6">
                  <img src="https://via.placeholder.com/60" alt="Icon 3" class="mx-auto" style="width: 60px; height: 60px;">
                  <h3 :class="{ 'text-blue-600': activeSectionTab === 3 }" class="text-2xl font-bold text-gray-900">عنوان 3</h3>
                  <p class="text-lg text-gray-500">العنوان الفرعي 3</p>
                  <p class="text-md text-gray-600">نص توضيحي بالعربية يمكن استخدامه لشرح مزايا وخصائص التبويب الثالث.</p>
                </div>
              </div>
          
              <!-- Larger Images with More Spacing for Content -->
              <div class="text-center space-y-20"> <!-- Increased space between content items -->
                <div x-show="activeSectionTab === 1" class="mx-auto">
                  <img src="https://via.placeholder.com/600x400" alt="Image 1" class="mx-auto rounded-lg shadow-xl">
                </div>
                <div x-show="activeSectionTab === 2" class="mx-auto">
                  <img src="https://via.placeholder.com/600x400" alt="Image 2" class="mx-auto rounded-lg shadow-xl">
                </div>
                <div x-show="activeSectionTab === 3" class="mx-auto">
                  <img src="https://via.placeholder.com/600x400" alt="Image 3" class="mx-auto rounded-lg shadow-xl">
                </div>
              </div>
            </div>
          </div>
          


    </section>

    <section id="testimonials" class="bg-gradient-to-tr from-blue-400 via-indigo-700 to-blue-500 mt-20">

        <div class="max-w-7xl px-4 py-8 mx-auto lg:py-16 lg:px-6">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="mb-3 text-2xl sm:text-3xl md:text-4xl font-extrabold leading-tight tracking-tight sm:text-center text-left text-white poppins">ابدأ تجربتك المجانية اليوم</h2>
                <p class="mb-3 sm:mb-8 font-normal text-white dark:text-gray-400 text-sm sm:text-base md:text-lg sm:text-center poppins text-left">ابدأ في تصميم صفحة الهبوط التي طالما حلمت بها. لا حاجة لبطاقة ائتمان.</p>
                <a href="#_" class="text-dark sm:w-auto w-full block sm:inline-block bg-white poppins font-bold rounded text-sm px-5 py-3 mr-2 mb-2">ابدأ اليوم</a>
            </div>
        </div>
        
    
    </section>


    <section id="pricing" class="text-gray-600 mt-20">
        <div class="px-10 py-24 mx-auto md:px-12 max-w-7xl">
            <div class="w-full mx-auto text-center xl:w-1/2 lg:w-3/4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="inline-block w-8 h-8 mb-8 text-gray-400" viewBox="0 0 975.036 975.036"><path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path></svg>
                <p class="text-base leading-relaxed md:text-lg">بفضل روعة هذه الشركة، استطعت أن أضاعف العائد الشهري المتكرر ثلاث مرات بتطبيق أدواتهم وممارساتهم في عملنا!</p>
                <span class="inline-block w-10 h-1 mt-8 mb-6 bg-indigo-500 rounded" data-primary="indigo-500"></span>
                <h2 class="text-sm font-medium tracking-wider text-gray-900 uppercase title-font">جون دو</h2>
                <p class="text-gray-500">مدير المنتج الأول</p>
                
            </div>
        </div>
    </section>


    <section class="py-12 md:py-16 lg:py-16 2xl:py-20 bg-gray-900 mt-20">
        <div class="max-w-7xl mx-auto px-10">
            <div class="mb-12 xl:mb-20 lg:text-center px-4">
                <p class="mb-2 text-blue-500 uppercase font-medium">خطط الأسعار الخاصة بنا</p>
                <h2 class="mb-4 text-4xl sm:text-5xl xl:text-6xl text-white font-bold">اختر الخطة التي تناسبك.</h2>
                <p class=" text-base sm:text-lg text-gray-300 xl:text-2xl">للأعمال التجارية الكبيرة والصغيرة. لدينا خطة تناسب احتياجات أي فريق ومنظمة.</p>
            </div>
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-wrap items-center">
                    <div class="w-full lg:w-1/3 px-3 mb-8 lg:mb-0">
                        <div class="px-12 py-12 bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900 border border-gray-700 rounded-xl">
                            <div class="pb-8 mb-14 border-b text-center border-gray-700">
                                <div class="px-3">
                                    <h3 class="text-4xl text-white font-bold">مجاني</h3>
                                    <p class="text-gray-300 mt-3">خطة البداية الأساسية للأفراد والشركات الصغيرة</p>
                                </div>
                            </div>
                            <ul class="text-lg text-white border-b border-gray-700 pb-12">
                                <li class="flex items-center mb-8">
                                    <svg class="w-6 h-6 mr-4 stroke-current text-blue-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <!-- SVG content -->
                                    </svg>
                                    <span>مستودعات عامة غير محدودة</span>
                                </li>
                                <li class="flex items-center mb-8">
                                    <svg class="w-6 h-6 mr-4 stroke-current text-blue-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <!-- SVG content -->
                                    </svg>
                                    <span>قاعدة بيانات واحدة</span>
                                </li>
                                <li class="flex items-center mb-8">
                                    <svg class="w-6 h-6 mr-4 stroke-current text-blue-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <!-- SVG content -->
                                    </svg>
                                    <span>20 جيجابايت من التخزين</span>
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-6 h-6 mr-4 stroke-current text-blue-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <!-- SVG content -->
                                    </svg>
                                    <span>دعم المجتمع</span>
                                </li>
                            </ul>
                            <div class="flex text-white justify-center py-8 space-x-3 items-center w-full font-mono">
                                <span class="text-4xl">$0</span>
                                <span>لكل مستخدم / شهريا</span>
                            </div>
                            <div class="text-center">
                                <a class="inline-block w-full rounded-md mb-2 md:mb-0 px-8 py-4 font-medium leading-normal bg-blue-500  hover:bg-blue-600 text-white transition duration-200" href="#">جربه مجانا</a>
                            </div>
                        </div>
                    </div>
                                <!-- Team Plan -->
                                <div class="w-full lg:w-1/3 mb-8 lg:mb-0">
                                    <div class="w-full p-1.5 bg-gradient-to-b from-blue-600 via-blue-500 to-blue-600 rounded-xl">
                                        <p class="text-center w-full pb-3 py-1.5 leading-tight font-bold text-white uppercase">الأكثر شعبية</p>
                                        <div class="px-12 py-12 bg-gray-900 bg-opacity-90 border border-gray-700 rounded-xl">
                                            <div class="pb-8 mb-14 border-b text-center border-gray-700">
                                                <div class="px-3">
                                                    <h3 class="text-4xl text-white font-bold">فريق</h3>
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
                                                <span class="text-4xl">$5</span>
                                                <span>لكل مستخدم / شهريا</span>
                                            </div>
                                            <div class="text-center">
                                                <a class="inline-block w-full rounded-md mb-2 md:mb-0 px-8 py-4 font-medium leading-normal bg-blue-500  hover:bg-blue-600 text-white transition duration-200" href="#">جربه مجانا</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                
                                <!-- Enterprise Plan -->
                                <div class="w-full lg:w-1/3 px-3 mb-8 lg:mb-0">
                                    <div class="px-12 py-12 bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900 border border-gray-700 rounded-xl">
                                        <div class="pb-8 mb-14 border-b text-center border-gray-700">
                                            <div class="px-3">
                                                <h3 class="text-4xl text-white font-bold">مؤسسة</h3>
                                                <p class="text-gray-300 mt-3">أفضل الأدوات للشركات الكبيرة والمؤسسات</p>
                                            </div>
                                        </div>
                                        <ul class="text-lg text-white border-b border-gray-700 pb-12">
                                            <li class="flex items-center mb-8">
                                                <!-- SVG content -->
                                                <span>كل ما في خطة الفريق</span>
                                            </li>
                                            <li class="flex items-center mb-8">
                                                <!-- SVG content -->
                                                <span>قواعد بيانات وتخزين غير محدود</span>
                                            </li>
                                            <li class="flex items-center mb-8">
                                                <!-- SVG content -->
                                                <span>نقاط نهاية API مخصصة</span>
                                            </li>
                                            <li class="flex items-center">
                                                <!-- SVG content -->
                                                <span>دعم أولوي على مدار الساعة طوال أيام الأسبوع</span>
                                            </li>
                                        </ul>
                                        <div class="flex text-white justify-center py-8 space-x-3 items-center w-full font-mono">
                                            <span class="text-4xl">$15</span>
                                            <span>لكل مستخدم / شهريا</span>
                                        </div>
                                        <div class="text-center">
                                            <a href="" class="inline-block w-full rounded-md mb-2 md:mb-0 px-8 py-4 font-medium leading-normal bg-blue-500  hover:bg-blue-600 text-white transition duration-200" href="#">جربه مجانا</a>
                                        </div>
                                    </div>
                                </div>
                
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white mt-20">
        <div class="px-8 mx-auto max-w-7xl lg:px-16">
            <h2 class="mb-4 text-xl font-bold md:text-3xl">الأسئلة الشائعة</h2>
            <div class="grid grid-cols-1 gap-0 text-gray-600 md:grid-cols-2 md:gap-16">
                <div>
                    <h5 class="mt-10 mb-3 font-semibold text-gray-900">ما هو تيلز؟</h5>
                    <p>تيلز هو مُنشئ صفحات يعمل بالسحب والإفلات مبني على أساس TailwindCSS. يمكنك إفلات المكونات لإنشاء صفحة يمكنك تصديرها.</p>
                    <h5 class="mt-10 mb-3 font-semibold text-gray-900">هل يمكنني تجربته مجانًا؟</h5>
                    <p>بالتأكيد، يمكنك تجربة تيلز مجانًا؛ ومع ذلك، إذا كنت ترغب في الوصول إلى جميع المكونات وتصدير الصفحة، ستحتاج إلى ترقية حسابك.</p>
                    <h5 class="mt-10 mb-3 font-semibold text-gray-900">أين يمكنني الذهاب لترقية حسابي؟</h5>
                    <p>
                        يمكنك ترقية حسابك بزيارة <a href="https://devdojo.com/pro" class="text-indigo-500 underline" data-primary="indigo-500">صفحة الترقية إلى برو</a>. ستحصل أيضًا على وصول إلى العديد من التطبيقات وأقسام الموقع الأخرى.
                        <a href="https://help.hellonext.co/faq/startup-eligibility/" target="_blank">هنا</a>.
                    </p>
                    <h5 class="mt-10 mb-3 font-semibold text-gray-900">كم من الوقت سأتمكن من الوصول إلى تيلز؟</h5>
                    <p>
                        ستتمتع بوصول غير محدود إلى جميع صفحاتك المُعدة مسبقًا؛ ومع ذلك، إذا كنت ترغب في تنزيل الصفحات وتصديرها، ستحتاج إلى حساب برو.
                        <a href="https://paddle.com" target="_blank">Paddle</a> لمعالجة الدفعات.
                    </p>
                </div>
                <div>
                    <h5 class="mt-10 mb-3 font-semibold text-gray-900">كيف يمكنني تطبيقه في مشروعي؟</h5>
                    <p>التطبيق في مشروعك بسيط للغاية. يمكنك استخدام الصفحة المُصدرة كنقطة انطلاق، أو يمكنك نسخ الكود HTML ولصقه في صفحتك الخاصة.</p>
                    <h5 class="mt-10 mb-3 font-semibold text-gray-900">ما هي ترخيص الصفحات؟</h5>
                    <p>لديك استخدام غير محدود للقوالب المستخدمة في تيلز؛ ومع ذلك، لا يمكنك إعادة استخدام القوالب للبيع للآخرين لاستخدامها.</p>
                    <h5 class="mt-10 mb-3 font-semibold text-gray-900">هل يمكنني إلغاء حسابي إذا لم أعد بحاجة إليه؟</h5>
                    <p>بالطبع، يمكنك إلغاء حسابك في أي وقت، ويمكنك العودة والترقية مرة أخرى متى كنت جاهزًا.</p>
                    <h5 class="mt-10 mb-3 font-semibold text-gray-900">ماذا لو كنت بحاجة إلى مساعدة في مشروعي؟</h5>
                    <p>إذا كنت بحاجة إلى مساعدة في تطبيق القوالب في مشروعك، يمكنك الاتصال بالدعم أو يمكنك زيارة <a href="https://devdojo.com/questions" class="text-indigo-500 underline" data-primary="indigo-500">قسم الأسئلة</a> لدينا.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="box-border pt-5 leading-7 text-gray-900 bg-white border-0 border-gray-200 border-solid pb-7 ">
        <div class="box-border px-4 mx-auto border-solid md:px-6 lg:px-8 max-w-7xl">
            <div class="relative flex flex-col items-start justify-between leading-7 text-gray-900 border-0 border-gray-200 md:flex-row md:items-center">
                <a href="{{route('welcome')}}" class="left-0 flex items-center justify-center order-first w-full mb-4 font-medium text-gray-900 md:justify-start md:absolute md:w-64 lg:order-none lg:w-auto title-font lg:items-center lg:justify-center md:mb-0">
                    <img height="100px" width="100px" src="{{ url('icons/new.webp') }}" alt="">
                </a>
                <ul class="box-border flex mx-auto my-6 space-x-6">
                    <li class="relative mt-2 leading-7 text-left text-gray-900 border-0 border-gray-200 md:border-b-0 md:mt-0">
                        <a href="#features" class="box-border items-center block w-full px-4 text-base font-normal leading-normal text-gray-900 no-underline border-solid cursor-pointer hover:text-blue-600 focus-within:text-blue-700 sm:text-left">المزايا</a>
                    </li>
                    <li class="relative mt-2 leading-7 text-left text-gray-900 border-0 border-gray-200 md:border-b-0 md:mt-0">
                        <a href="#testimonials" class="box-border items-center block w-full px-4 text-base font-normal leading-normal text-gray-900 no-underline border-solid cursor-pointer hover:text-blue-600 focus-within:text-blue-700  sm:text-left">اراء العملاء</a>
                    </li>
                    <li class="relative mt-2 leading-7 text-left text-gray-900 border-0 border-gray-200 md:border-b-0 md:mt-0">
                        <a href="#pricing" class="box-border items-center block w-full px-4 text-base font-normal leading-normal text-gray-900 no-underline border-solid cursor-pointer hover:text-blue-600 focus-within:text-blue-700 sm:px-0 sm:text-left">الباقات</a>
                    </li>
                 
                </ul>
                <div class="box-border right-0 flex justify-center w-full mt-4 space-x-3 border-solid md:w-auto md:justify-end md:absolute md:mt-0">
                    <a href="#_" class="inline-flex items-center leading-7 text-gray-900 no-underline border-0 border-gray-200 cursor-pointer hover:text-blue-700 focus-within:text-blue-700">
                        <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"></path><path d="M7 10v4h3v7h4v-7h3l1-4h-4V8a1 1 0 011-1h3V3h-3a5 5 0 00-5 5v2H7"></path></svg>
                    </a>
                    <a href="#_" class="inline-flex items-center leading-7 text-gray-900 no-underline border-0 border-gray-200 cursor-pointer hover:text-blue-700 focus-within:text-blue-700">
                        <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"></path><path d="M9 19c-4.3 1.4-4.3-2.5-6-3m12 5v-3.5c0-1 .1-1.4-.5-2 2.8-.3 5.5-1.4 5.5-6a4.6 4.6 0 00-1.3-3.2 4.2 4.2 0 00-.1-3.2s-1.1-.3-3.5 1.3a12.3 12.3 0 00-6.2 0C6.5 2.8 5.4 3.1 5.4 3.1a4.2 4.2 0 00-.1 3.2A4.6 4.6 0 004 9.5c0 4.6 2.7 5.7 5.5 6-.6.6-.6 1.2-.5 2V21" class=""></path></svg>
                    </a>
                    <a href="#_" class="inline-flex items-center leading-7 text-gray-900 no-underline border-0 border-gray-200 cursor-pointer hover:text-blue-700 focus-within:text-blue-700">
                        <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"></path><circle cx="12" cy="12" r="9"></circle><path d="M9 3.6c5 6 7 10.5 7.5 16.2M6.4 19c3.5-3.5 6-6.5 14.5-6.4M3.1 10.75c5 0 9.814-.38 15.314-5"></path></svg>
                    </a>
                    <a href="#_" class="inline-flex items-center leading-7 text-gray-900 no-underline border-0 border-gray-200 cursor-pointer hover:text-blue-700 focus-within:text-blue-700">
                        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M0 0h24v24H0z" stroke="none"></path><rect x="4" y="4" width="16" height="16" rx="4"></rect><circle cx="12" cy="12" r="3"></circle><path d="M16.5 7.5v.001"></path></svg>
                    </a>
                </div>
            </div>
            <div class="pt-4 mt-4 leading-7 text-center text-gray-600 border-t border-gray-200 md:mt-5 md:pt-5 ">
                <p class="box-border mt-0 text-sm border-0 border-solid">
                    © 2021 Tails. All Rights Reserved.
                </p>
            </div>
        </div>
    </section>
    
</x-welcome-layout>
