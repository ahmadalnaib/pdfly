<x-welcome-layout>
    
    <div class="container pt-16 mx-auto text-left md:text-center">
        <div class="relative max-w-4xl mx-auto">
            <h1 class="pb-2 text-4xl font-extrabold text-right text-transparent sm:text-6xl md:text-7xl md:text-center bg-clip-text bg-gradient-to-r from-indigo-600 via-blue-500 to-green-400" data-primary="indigo-600">  
                تفاعل مع ملفات PDF بسلاسة
            </h1>
            <p class="mt-8 text-sm text-right text-gray-500 sm:text-base md:text-lg md:max-w-xl md:text-center md:mx-auto">
                سواء كنت تتعامل مع وثائق قانونية أو تقارير مالية، pdfly.ai يتيح لك التفاعل مع ملفاتك بطرق مبتكرة. استفسر، استلم ملخصات، واعثر على المعلومات بسهولة.
            </p>
            <a href="{{ route('register') }}"
                class="inline-block w-full px-12 py-5 mt-8 text-xl font-semibold leading-5 text-center text-white capitalize bg-gray-900 md:w-auto hover:bg-gray-700 focus:outline-none focus:bg-gray-700 md:mx-0 rounded-md transition-colors duration-300 ease-in-out"
              >
                ابدأ التجربة المجانية
            </a>
        </div>
    </div>
    
    </section>
    

    <section class="mt-20" id="features">
        <div x-data="{ activeTab: 1 }" class="flex min-h-screen">
            <!-- Left Side: Dynamic Photo based on active tab -->
            <div class="w-1/2 flex items-center justify-center bg-gray-100">
                <template x-if="activeTab === 1">
                    <video width="320" height="240" controls>
                        <source src="{{ asset('storage/videos/one.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    
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
                   <h2 class="text-xl font-bold">رفع PDF</h2>
                   <p class="text-sm">ارفع أي ملف PDF، سواء كانت عقود، سير ذاتية، تقارير، مقالات أو أي مستند آخر واستفسر عنه بأي لغة.</p>
               </div>
               <div @click="activeTab = 2" :class="{ 'bg-white bg-opacity-25': activeTab === 2 }"
                    class="cursor-pointer p-6 rounded-lg transition-all ease-in-out duration-150">
                   <h2 class="text-xl font-bold">التفاعل مع الذكاء الاصطناعي</h2>
                   <p class="text-sm">استخدم الشات مع الذكاء الاصطناعي للحصول على إجابات حول ملف PDF الخاص بك في أي موضوع.</p>
               </div>
               <div @click="activeTab = 3" :class="{ 'bg-white bg-opacity-25': activeTab === 3 }"
                    class="cursor-pointer p-6 rounded-lg transition-all ease-in-out duration-150">
                   <h2 class="text-xl font-bold">دعم لغوي شامل</h2>
                   <p class="text-sm">تفاعل مع ملفاتك بأي لغة، لتجربة مستخدم عالمية دون حواجز لغوية.</p>
               </div>
               <div @click="activeTab = 4" :class="{ 'bg-white bg-opacity-25': activeTab === 4 }"
                    class="cursor-pointer p-6 rounded-lg transition-all ease-in-out duration-150">
                   <h2 class="text-xl font-bold">خدمة على مدار الساعة</h2>
                   <p class="text-sm">الذكاء الاصطناعي متاح دائمًا لإجابة استفساراتك حول ملفات PDF في أي وقت ومن أي مكان.</p>
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
                <p class="text-base sm:text-lg text-gray-300 xl:text-2xl">  
                  فقط باستثمار بسيط، يمكنك زيادة إنتاجيتك عشر مرات وتوفير ساعات في اليوم من خلال قراءة ملفات PDF.
              </p>
            </div>
            @include('layouts.plan')
        </div>
    </section>

    <section class="py-24 bg-white mt-20">
        <div class="px-8 mx-auto max-w-7xl lg:px-16">
            <h2 class="mb-4 text-xl font-bold md:text-3xl">الأسئلة الشائعة</h2>
            <div class="grid grid-cols-1 gap-0 text-gray-600 md:grid-cols-2 md:gap-16">
                <div>
                    <h5 class="mt-10 mb-3 font-semibold text-gray-900"> هل PDFLY.ai مجاني؟ </h5>
                 <P>نعم، يمكنك رفع ملف PDF واحد (بحد أقصى 10 ميجابايت) لتجربته مجانًا. لدينا أيضًا خطط مدفوعة تمنحك حصة أكبر.</P>

                    <h5 class="mt-10 mb-3 font-semibold text-gray-900"> كيف يعمل؟</h5>
                 <P>البدء سهل! ببساطة قم بالتسجيل، رفع مستند، وابدأ الدردشة معه. يمكنك طرح الأسئلة والدردشة مع مستنداتك باستخدام اللغة الطبيعية. سيقوم النموذج الذكي الأساسي بجلب أي معلومات ذات صلة من المستند ويعطيك إجابة مستنيرة (مع مصادر مذكورة).</P>

                    <h5 class="mt-10 mb-3 font-semibold text-gray-900"> ما نوع المستند الذي يمكنني رفعه؟ </h5>
                    <P>يمكنك رفع ملفات PDF (.pdf) فقط في الوقت الحالي. ومع ذلك، نعمل على دعم المزيد من أنواع الملفات في المستقبل.</P>

                    <h5 class="mt-10 mb-3 font-semibold text-gray-900">    هل يمكن لـ PDFLY.ai التحدث بلغات غير الإنجليزية؟
                        </h5>
                  <P>نعم، يمكن لـ PDF.ai قراءة ملفات PDF بأي لغة والإجابة على الأسئلة. يمكنك رفع ملف PDF بلغة واحدة وطرح الأسئلة بلغة أخرى. سيعطيك PDF.ai الإجابات باللغة التي تستخدمها.</P>
                </div>

                <div>
                    <h5 class="mt-10 mb-3 font-semibold text-gray-900">  ما هو نموذج OpenAI الذي يستخدمه PDFLY.ai؟</h5>
                  <P>نحن نستخدم gpt-3.5-turbo-16k لجميع العملاء المدفوعين. بالنسبة للمستخدمين المجانيين، نستخدم gpt-3.5-turbo (النموذج الأساسي 4K). يوفر نموذج gpt-3.5-turbo-16k طول سياق أربع مرات أكبر من النموذج الأساسي 4k.</P>

                    <h5 class="mt-10 mb-3 font-semibold text-gray-900">أين يتم تخزين ملفاتي؟   </h5>
                    <P>تخضع المستندات التي تم رفعها للتشفير أثناء التخزين وأثناء نقلها. يتم تخزينها بأمان من قبل مزود تخزين البيانات لدينا، الذي يحمل شهادة SOC2 من النوع الثاني. نحن نفهم أن بعض الأفراد يعطون الأولوية لخصوصية البيانات، ولهذا نقدم خيار المستند الخاص لمعالجة مستندات PDF. عند اختيار هذا الخيار، لن تتلامس مستنداتك أبدًا مع تخزين السحابة لدينا، مما يضمن سريتها.

                    </P>

                  
                    
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
