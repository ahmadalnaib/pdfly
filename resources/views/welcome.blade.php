<x-welcome-layout>
    <section class="mt-10 sm:mt-20">
        <div class="container pt-2 sm:pt-4 md:pt-16 mx-auto text-center">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="pb-2 text-xl sm:text-2xl md:text-4xl lg:text-6xl xl:text-7xl font-extrabold text-transparent text-center bg-clip-text bg-gradient-to-r from-indigo-600 via-blue-500 to-green-400" data-primary="indigo-600">
                    تفاعل مع ملفات PDF بسلاسة
                </h1>
                <p class="mt-2 sm:mt-4 md:mt-8 text-xs sm:text-sm md:text-base lg:text-lg text-center text-gray-500 max-w-xs sm:md:max-w-xl mx-auto">
                    سواء كانت وثائق قانونية، تقارير مالية، عقود، سير ذاتية، أو أي نوع آخر من المستندات، يتيح لك pdfly.ai التفاعل مع ملفات PDF بطرق مبتكرة. استفسر، استلم ملخصات، واعثر على المعلومات الضرورية بكل سهولة ويسر، مهما كانت لغة المستند
                </p>
                <a href="{{ route('register') }}" class="inline-block w-full sm:max-w-xs md:max-w-sm lg:max-w-md xl:max-w-lg px-2 sm:px-4 md:px-6 lg:px-8 py-2 sm:py-3 md:py-4 lg:py-5 mt-2 sm:mt-4 md:mt-6 lg:mt-8 text-xs sm:text-sm md:text-base lg:text-lg font-semibold leading-5 text-center text-white capitalize bg-gray-900 hover:bg-gray-700 focus:outline-none focus:bg-gray-700 rounded-md transition-colors duration-300 ease-in-out">
                    ابدأ التجربة المجانية
                </a>
            </div>
        </div>
    </section>
    <section class="mt-20">
        <div class="bg-white py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
                <!-- Tabs with Increased Spacing and More Text -->
                <div class="flex flex-col md:flex-row justify-center gap-4 md:gap-20 mb-20">
                    <div class="text-center cursor-pointer space-y-6">
                        <img src="{{ asset('screen/black-one.webp') }}" alt="PDF Analysis Icon" class="mx-auto" style="width: 60px; height: 60px;">
                        <h3 class="text-xl md:text-2xl font-bold text-gray-900"> فك رموز PDF </h3>
                        <p class="text-md md:text-lg text-gray-500"> سحر استخلاص البيانات</p>
                        <p class="text-sm md:text-md text-gray-600">استفسر عن محتوى PDF واحصل على ملخصات ذكية واستخراج البيانات بلمسة واحدة.</p>
                    </div>
                    <div class="text-center cursor-pointer space-y-6">
                        <img src="{{ asset('screen/black-two.webp') }}" alt="Document Security Icon" class="mx-auto" style="width: 60px; height: 60px;">
                        <h3 class="text-xl md:text-2xl font-bold text-gray-900">أمان المستندات</h3>
                        <p class="text-md md:text-lg text-gray-500">حماية وخصوصية</p>
                        <p class="text-sm md:text-md text-gray-600">احمِ مستنداتك بأقصى درجات الأمان. استمتع بخصائص فائقة للحفاظ على سلامة وخصوصية بياناتك</p>
                    </div>
                    <div class="text-center cursor-pointer space-y-6">
                        <img src="{{ asset('screen/black-three.webp') }}" alt="Multilingual Support Icon" class="mx-auto" style="width: 60px; height: 60px;">
                        <h3 class="text-xl md:text-2xl font-bold text-gray-900">دعم متعدد اللغات</h3>
                        <p class="text-md md:text-lg text-gray-500"> عبور بلا حدود لغوية </p>
                        <p class="text-sm md:text-md text-gray-600">استفسر وتفاعل مع ملفات PDF بأي لغة، مما يتيح إمكانية وصول واستخدام عالميين.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-20" id="features">
        <div x-data="{ activeTab: 1 }" class="flex flex-col md:flex-row min-h-screen">
            <!-- Left Side: Dynamic Photo based on active tab -->
            <div class="w-full md:w-1/2 flex items-center justify-center bg-gray-100">
                <template x-if="activeTab === 1">
                    <video class="h-full w-full object-scale-down" controls autoplay>
                        <source src="{{ asset('/videos/first.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>

                </template>
                <template x-if="activeTab === 2">
                    <video class="h-full w-full object-scale-down" controls autoplay>
                        <source src="{{ asset('/videos/third.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </template>

                <template x-if="activeTab === 3">
                    <video class=" h-full w-full object-scale-down" controls autoplay>
                        <source src="{{ asset('/videos/second.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </template>
                </template>
           
            </div>

            <!-- Right Side: Tabs with Title and Subtitle -->
            <div class="w-full md:w-1/2 bg-gradient-to-tr from-blue-400 via-indigo-700 to-blue-500 text-white flex flex-col items-center justify-center p-4 sm:p-10">
                <div class="space-y-4 sm:space-y-8"> <!-- Increased space between tabs -->
                    <div @click="activeTab = 1" :class="{ 'bg-white bg-opacity-25': activeTab === 1 }" class="cursor-pointer p-6 rounded-lg transition-all ease-in-out duration-150">
                        <h2 class="text-xl font-bold">رفع PDF</h2>
                        <p class="text-sm">ارفع أي ملف PDF، سواء كانت عقود، سير ذاتية، تقارير، مقالات أو أي مستند آخر واستفسر عنه بأي لغة.</p>
                    </div>
                    <div @click="activeTab = 2" :class="{ 'bg-white bg-opacity-25': activeTab === 2 }" class="cursor-pointer p-6 rounded-lg transition-all ease-in-out duration-150">
                        <h2 class="text-xl font-bold">التفاعل مع الذكاء الاصطناعي</h2>
                        <p class="text-sm">استخدم الشات مع الذكاء الاصطناعي للحصول على إجابات حول ملف PDF الخاص بك في أي موضوع.</p>
                    </div>
                    <div @click="activeTab = 3" :class="{ 'bg-white bg-opacity-25': activeTab === 3 }" class="cursor-pointer p-6 rounded-lg transition-all ease-in-out duration-150">
                        <h2 class="text-xl font-bold">دعم لغوي شامل</h2>
                        <p class="text-sm">تفاعل مع ملفاتك بأي لغة، لتجربة مستخدم عالمية دون حواجز لغوية.</p>
                    </div>
     

                </div>
            </div>
        </div>

    </section>

 


    <section id="testimonials" class="bg-gradient-to-tr from-blue-400 via-indigo-700 to-blue-500 mt-20">

        <div class="max-w-7xl px-4 py-8 mx-auto lg:py-16 lg:px-6">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="mb-3 text-2xl sm:text-3xl md:text-4xl font-extrabold leading-tight tracking-tight sm:text-center text-left text-white poppins">اكتشف قوة PDF المبتكرة اليوم</h2>
                <p class="mb-3 sm:mb-8 font-normal text-white dark:text-gray-400 text-sm sm:text-base md:text-lg sm:text-center poppins text-left">تحول رقمي لوثائقك من كافة الأنواع. استفسر، استلم ملخصات، واعثر على المعلومات بكل سهولة. ابدأ مع تجربتنا المجانية الآن، بدون الحاجة إلى بطاقة ائتمان.</p>
                <a href="{{route('login')}}" class="text-dark sm:w-auto w-full block sm:inline-block bg-white poppins font-bold rounded text-sm px-5 py-3 mr-2 mb-2">ابدأ تجربتك مجاناً</a>
            </div>
        </div>




    </section>


    <section id="pricing" class="text-gray-600 mt-20">
        <div class="px-10 py-24 mx-auto md:px-12 max-w-7xl">
            <div class="w-full mx-auto text-center xl:w-1/2 lg:w-3/4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="inline-block w-8 h-8 mb-8 text-gray-400" viewBox="0 0 975.036 975.036">
                    <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
                </svg>
                <p class="text-base leading-relaxed md:text-lg">من خلال استخدام خدمات pdfly.ai، تمكنت من تحسين فعالية دراستي وترجمة الأوراق الضرورية بكل يسر وسهولة. لقد كانت أدواتهم بمثابة جسر للوصول إلى المعرفة والتواصل الأفضل!</p>
                <span class="inline-block w-10 h-1 mt-8 mb-6 bg-indigo-500 rounded" data-primary="indigo-500"></span>
                <h2 class="text-sm font-medium tracking-wider text-gray-900 uppercase title-font">أمير الزهراني</h2>
                <p class="text-gray-500">طالب جامعي</p>


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

                    <h5 class="mt-10 mb-3 font-semibold text-gray-900"> هل يمكن لـ PDFLY.ai التحدث بلغات غير العربية؟
                    </h5>
                    <P>نعم، يمكن لـ PDF.ai قراءة ملفات PDF بأي لغة والإجابة على الأسئلة. يمكنك رفع ملف PDF بلغة واحدة وطرح الأسئلة بلغة أخرى. سيعطيك PDF.ai الإجابات باللغة التي تستخدمها.</P>
                </div>

                <div>
                    <h5 class="mt-10 mb-3 font-semibold text-gray-900"> ما هو نموذج OpenAI الذي يستخدمه PDFLY.ai؟</h5>
                    <P>نحن نستخدم gpt-3.5-turbo-16k لجميع العملاء المدفوعين. بالنسبة للمستخدمين المجانيين، نستخدم gpt-3.5-turbo (النموذج الأساسي 4K). يوفر نموذج gpt-3.5-turbo-16k طول سياق أربع مرات أكبر من النموذج الأساسي 4k.</P>

                    <h5 class="mt-10 mb-3 font-semibold text-gray-900">أين يتم تخزين ملفاتي؟ </h5>
                    <P> 
                        . الملفات التي ترفعها مشفرة ومخزنة بأمان لدى مزود خدمة تخزين موثوق، لضمان خصوصيتك وأمان بياناتك

                    </P>

                    <h5 class="mt-10 mb-3 font-semibold text-gray-900"> التسعير والمستردات</h5>
                    <P> 
                       
بسبب التكاليف العالية التي نتحملها لإدارة العمل، يؤسفنا أن نعلمكم بأننا لا نستطيع تقديم استرداد النقود، سواء كان ذلك جزئيًا أو كاملًا، في الوقت الحالي. لكن، يمكنكم بحرية إلغاء اشتراككم في أي وقت ترغبون فيه. عند اتخاذكم قرار الإلغاء، لن يترتب عليكم أي تكاليف إضافية.

                    </P>

                    <h5 class="mt-10 mb-3 font-semibold text-gray-900"> استفسار </h5>
                    <P> 
                       
                        في حال كان لديكم أي استفسار، ملاحظة، أو إذا كانت لديكم فكرة مبتكرة تودون مشاركتها لتحسين خدماتنا أو لإضافة ميزة جديدة، نحن نشجعكم على التواصل معنا مباشرة. يمكنكم إرسال جميع أفكاركم وتعليقاتكم إلى البريد الإلكتروني: info@pdfly.ai. نحن هنا لنستمع ونعمل معًا نحو تحقيق الأفضل.

                    </P>
                </div>

                
            </div>
        </div>
    </section>

    <section class="box-border pt-5 leading-7 text-gray-900 bg-white border-0 border-gray-200 border-solid pb-7 ">
        <div class="box-border px-4 mx-auto border-solid md:px-6 lg:px-8 max-w-7xl">
            <div class="relative flex flex-col items-start justify-between leading-7 text-gray-900 border-0 border-gray-200 md:flex-row md:items-center">
                <a href="{{route('welcome')}}" class="left-0 flex items-center justify-center order-first w-full mb-4 font-medium text-gray-900 md:justify-start md:absolute md:w-64 lg:order-none lg:w-auto title-font lg:items-center lg:justify-center md:mb-0">
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                </a>
                <ul class="box-border flex mx-auto my-6 space-x-6">
                    <li class="relative mt-2 leading-7 text-left text-gray-900 border-0 border-gray-200 md:border-b-0 md:mt-0">
                        <a href="{{route('privacy_policy')}}" target="_blank" class="box-border items-center block w-full px-4 text-base font-normal leading-normal text-gray-900 no-underline border-solid cursor-pointer hover:text-blue-600 focus-within:text-blue-700 sm:text-left">سياسة الخصوصية </a>
                    </li>
                    <li class="relative mt-2 leading-7 text-left text-gray-900 border-0 border-gray-200 md:border-b-0 md:mt-0">
                        <a href="{{route('terms')}}" target="_blank" class="box-border items-center block w-full px-4 text-base font-normal leading-normal text-gray-900 no-underline border-solid cursor-pointer hover:text-blue-600 focus-within:text-blue-700  sm:text-left"> شروط الاستخدام</a>
                    </li>
                    <li class="relative mt-2 leading-7 text-left text-gray-900 border-0 border-gray-200 md:border-b-0 md:mt-0">
                        <a href="{{route('refund_policy')}}" target="_blank" class="box-border items-center block w-full px-4 text-base font-normal leading-normal text-gray-900 no-underline border-solid cursor-pointer hover:text-blue-600 focus-within:text-blue-700 sm:px-0 sm:text-left">سياسة المستردات</a>
                    </li>

                </ul>
                <div class="box-border right-0 flex justify-center w-full mt-4 space-x-3 border-solid md:w-auto md:justify-end md:absolute md:mt-0">
                    <a target="_blank" href="https://twitter.com/pdfly_ai" class="inline-flex items-center leading-7 text-gray-900 no-underline border-0 border-gray-200 cursor-pointer hover:text-blue-700 focus-within:text-blue-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
  <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
</svg>
                    </a>
                 
                   
                  
                </div>
            </div>
            <div class="pt-4 mt-4 leading-7 text-center text-gray-600 border-t border-gray-200 md:mt-5 md:pt-5 ">
                <p class="box-border mt-0 text-sm border-0 border-solid">
                    © 2024 PDFLY.ai جميع الحقوق محفوظة.
                </p>
            </div>
        </div>
    </section>

</x-welcome-layout>