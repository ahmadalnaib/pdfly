

<x-app-layout dir="rtl">
    <div class="flex flex-col md:flex-row justify-between py-12 px-4 sm:px-6 lg:px-8 h-screen">
        <div class="w-full md:w-1/2 p-4">
            <h2 class="text-2xl font-bold mb-4">الملف المرفوع:</h2>
            <!-- Display the PDF file -->
            <iframe src="{{ asset($filePath) }}" class="w-full h-full" frameborder="0"></iframe>
        </div>
  
        <div class="w-full md:w-1/2 p-4">
           
  
            <h3 class="text-xl font-bold mb-4">اطرح سؤالا عن هذا الملف:</h3>
            <form id="questionForm" class="w-full max-w-md mb-4">
                @csrf
                <div class="flex items-center border-b border-teal-500 py-2">
                    <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" name="question" placeholder="Enter your question">
                    <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" type="submit">
                        Ask
                    </button>
                </div>
            </form>
            
  
            <div id="answers" class="mt-4 overflow-auto h-64 bg-white border rounded p-4 shadow-lg">
                <!-- The answers will be inserted here -->
            </div>
  
            <a href="{{ route('pdf.store') }}" class="mt-4 inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">تحميل ملف آخر</a>
        </div>
    </div>
  


    <script>
        document.getElementById('questionForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
    
            // Show loading spinner
            const loadingParagraph = document.createElement('p');
            loadingParagraph.textContent ='جار التحميل...';
            document.getElementById('answers').appendChild(loadingParagraph);
    
            fetch('{{ route('ask.question') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                // Hide loading spinner and show the answer
                const answerParagraph = document.createElement('p');
                answerParagraph.className = 'mt-4';
                answerParagraph.innerHTML = `<div class="bg-gray-100 p-4 rounded-lg mb-4">
    <div class="font-bold text-blue-600 mb-2">سؤال: ${data.question}</div>
    <div class="font-bold text-green-600">جواب:</div>
    <div>${data.answer}</div>
  </div>`;
                document.getElementById('answers').replaceChild(answerParagraph, loadingParagraph);
                 // Clear the input field
            this.reset();
            });
        });
    </script>
  </x-app-layout>