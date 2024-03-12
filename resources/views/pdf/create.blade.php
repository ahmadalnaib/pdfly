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


                        <div class="flex items-center justify-center w-full">
                            <label for="dropzone-file"
                                class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400 test"><span
                                            class="font-semibold">انقر للتحميل</span> أو اسحب وأسقط</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG، PNG، JPG أو GIF (الحد
                                        الأقصى. 800x400px)</p>
                                </div>
                                <input id="dropzone-file" name="pdf"  type="file" class="hidden" required />
                            </label>
                        </div>

                        @if ($errors->has('pdf'))
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $errors->first('pdf') }}
                            </div>
                        @endif

                        <div>

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
    let dropzone = document.getElementById('dropzone-file');
    let dropzoneLabel = document.querySelector('label[for="dropzone-file"]');

    dropzoneLabel.addEventListener('dragover', function(e) {
        e
    .preventDefault(); // Prevent the default behavior of the browser, which is to open the file in a new window
    });

    dropzoneLabel.addEventListener('drop', function(e) {
        e
    .preventDefault(); // Prevent the default behavior of the browser, which is to open the file in a new window

        let files = e.dataTransfer.files; // Get the files from the drop event

        // If there are any files, trigger the change event after setting the files
        if (files.length) {
            dropzone.files = files;
            dropzone.dispatchEvent(new Event('change'));
        }
    });
    document.getElementById('dropzone-file').addEventListener('change', function() {
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
