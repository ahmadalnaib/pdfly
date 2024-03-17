<x-app-layout dir="rtl">
    <div class="flex flex-col md:flex-row justify-between py-12 px-4 sm:px-6 lg:px-8 h-screen">
        <div class="w-full md:w-1/2 p-4">
            <h2 class="text-2xl font-bold mb-4">الملف المرفوع:</h2>
            <!-- Display the PDF file -->
            <iframe src="{{ asset(str_replace('public', 'storage', $filePath)) }}" 
            class="w-full h-64 md:h-full" frameborder="0"></iframe>
        </div>

        <div class="w-full md:w-1/2 p-4">
            <h3 class="text-xl font-bold mb-4">اطرح سؤالا عن هذا الملف:</h3>
            <form id="questionForm" class="max-w-screen-md mb-4">
                @csrf
                <div class="flex flex-col md:flex-row items-center border-b border-teal-500 py-2">
                    <input
                    class="appearance-none bg-white border-none w-full text-gray-700 mr-1 py-4 px-2 leading-tight focus:outline-none focus:ring-0"
                        type="text" name="question" placeholder="أدخل سؤالك" required>
                    <div class="flex items-center mr-1 ml-1">
                        <select id="language" name="language"
                            class="mt-2 md:mt-0 block w-full md:w-auto rounded-md border-0 py-4 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6 mr-4">
                            <option value="arabic">Arabic</option>
                            <option value="english">English</option>
                            <option value="afghanistan">Afghanistan</option>
                            <option value="albanian">Albanian</option>
                            <option value="bengali">Bengali</option>
                            <option value="bulgarian">Bulgarian</option>
                            <option value="chinese">Chinese</option>
                            <option value="croatian">Croatian</option>
                            <option value="czech">Czech Republic</option>
                            <option value="danish">Danish</option>
                            <option value="dutch">Dutch</option>
                            <option value="filipino">Filipino</option>
                            <option value="finnish">Finland</option>
                            <option value="french">French</option>
                            <option value="german">German</option>
                            <option value="greek">Greece</option>
                            <option value="hebrew">Hebrew</option>
                            <option value="hindi">Hindi</option>
                            <option value="hungarian">Hungarian</option>
                            <option value="india">India</option>
                            <option value="indonesian">Indonesia</option>
                            <option value="italian">Italian</option>
                            <option value="japanese">Japanese</option>
                            <option value="korean">Korean</option>
                            <option value="malay">Malay</option>
                            <option value="norwegian">Norwegian</option>
                            <option value="pashto">Pashto</option>
                            <option value="persian">Persian</option>
                            <option value="polish">Polish</option>
                            <option value="portuguese">Portuguese</option>
                            <option value="romanian">Romanian</option>
                            <option value="russian">Russian</option>
                            <option value="serbian">Serbian</option>
                            <option value="slovak">Slovak</option>
                            <option value="spanish">Spanish</option>
                            <option value="swahili">Swahili</option>
                            <option value="swedish">Swedish</option>
                            <option value="thai">Thai</option>
                            <option value="turkish">Turkish</option>
                            <option value="urdu">Urdu</option>
                            <option value="vietnamese">Vietnamese</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <button
                        class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-4 px-4 rounded mt-2 md:mt-0 md:ml-3"
                        type="submit">
                        اسأل
                    </button>
                    </button>
                </div>
            </form>


            <div id="answers" class="mt-4 overflow-auto h-4/5 bg-white border rounded p-4 shadow-lg">
                <!-- The answers will be inserted here -->
            </div>


            <a href="{{ route('pdf.create') }}"
                class="mt-4 inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">تحميل ملف
                آخر</a>
        </div>
    </div>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    // Set the language select box to the previously selected language on page load
    const selectedLanguage = localStorage.getItem('selectedLanguage');
    if (selectedLanguage) {
        document.getElementById('language').value = selectedLanguage;
    }

    document.getElementById('questionForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);

        // Store selected language in localStorage
        const selectedLanguage = document.getElementById('language').value;
        localStorage.setItem('selectedLanguage', selectedLanguage);

        // Disable the submit button
        const submitButton = this.querySelector('button[type="submit"]');
        submitButton.disabled = true;

        // Clear the input field for the question
        const questionInput = this.querySelector('input[name="question"]');
        questionInput.value = '';

        // Create a new paragraph for the answer
        const answerId = 'answerText' + new Date().getTime();
        const answerParagraph = document.createElement('p');
        answerParagraph.className = 'mt-4';
        answerParagraph.innerHTML = `<div class="bg-gray-100 p-4 rounded-lg mb-4">
            <div class="font-bold text-blue-600 mb-2">سؤال: ${formData.get('question')}</div>
            <div class="font-bold text-green-600">جواب:</div>
            <div id="${answerId}">...جاري البحث عن الإجابة</div>
        </div>`;
        document.getElementById('answers').appendChild(answerParagraph);
        answerParagraph.scrollIntoView({
                    behavior: 'smooth'
                });

        // Fetch the response
        fetch('{{ route('ask.question') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            },
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            // Apply typing effect to the answer
            const answerText = document.getElementById(answerId);
            answerText.textContent = ''; // Clear the loading message
            let i = 0;
            function typeWriter() {
                if (i < data.answer.length) {
                    answerText.textContent += data.answer.charAt(i);
                    i++;
                    setTimeout(typeWriter, 10); // adjust the speed of typing here
                } else {
                    // Enable the submit button after displaying the answer
                    submitButton.disabled = false;

                    answerParagraph.scrollIntoView({
                    behavior: 'smooth'
                });
                }
            }
            typeWriter();
        });
    });
});

    </script>
</x-app-layout>
