<x-app-layout dir="rtl">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            أدوات ذكية لملفات PDF
        </h2>
    </x-slot>
    <div class="flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 ">
        @if (auth()->user()->credits > 0)
            <div class="max-w-xl w-full space-y-8 bg-white p-8 rounded-lg">
                <h2 class="text-2xl font-bold mb-2">رفع ملف PDF</h2>
                <p class="mb-4">قم بتحميل ملف PDF وسيقوم الذكاء الاصطناعي بالباقي</p>
                <form action="{{ route('pdf.store') }}" method="POST" enctype="multipart/form-data" class="mt-8 space-y-6"
                    id="uploadForm">
                    @csrf
                    <div class="rounded-md shadow-sm -space-y-px">
                        <div>
                            <!-- Hidden file input -->
                            <input id="pdf" name="pdf" type="file" required class="hidden">

                            <!-- Styled label -->
                            <label for="pdf"
                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm cursor-pointer">
                                ارفع ملف PDF
                            </label>
                            <span id="fileName" class="hidden"></span>
                        </div>
                    </div>
                    <div>
                        <button type="submit" id="submitButton"
                            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span id="buttonText">رفع </span>
                            <svg id="spinner" class="animate-spin h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                                style="display: none;">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        @else
            <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-2xl mx-auto">
                <p class="mb-4">ليس لديك أي رصيد لرفع ملفات pdf.</p>
                <p class="mb-4">" انضم إلى آلاف العملاء السعداء من خلال شراء المزيد أدناه."</p>
                <a href="{{ route('checkout') }}"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    شراء الرصيد
                </a>
            </div>
        @endif
    </div>
</x-app-layout>
<script>

document.getElementById('pdf').addEventListener('change', function() {
    // Show the file name when a file is selected
    const fileName = document.getElementById('fileName');
    fileName.textContent = this.files[0].name;
    fileName.classList.remove('hidden');
});

    document.getElementById('uploadForm').addEventListener('submit', function(e) {
        const submitButton = document.getElementById('submitButton');
        const buttonText = document.getElementById('buttonText');
        const spinner = document.getElementById('spinner');

        // Disable the button and show the spinner
        submitButton.disabled = true;
        buttonText.style.display = 'none';
        spinner.style.display = 'block';
    });
</script>
