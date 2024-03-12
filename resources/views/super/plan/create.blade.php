<x-super-layout dir="rtl">
  <div class="flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 ">
    <div class="max-w-xl w-full space-y-8 bg-white p-8 rounded-lg">
      <h2 class="text-2xl font-bold mb-2"> انشاء خطة </h2>
      <form action="{{ route('plan.store') }}" method="POST" enctype="multipart/form-data" class="mt-8 space-y-6" id="uploadForm">
        @csrf
        <div>
          <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
          <input type="text" name="name" id="name" autocomplete="name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <div>
          <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
          <textarea name="description" id="description" rows="3" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
        </div>
        <div>
          <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
          <input type="text" name="price" id="price" autocomplete="price" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <div>
          <label for="credits" class="block text-sm font-medium text-gray-700">Credits</label>
          <input type="number" name="credits" id="credits" autocomplete="credits" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <div>
        <label for="live" class="block text-sm font-medium text-gray-700">Live</label>
        <input type="checkbox" name="live" id="live" class="mt-1 block py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
        <div>
          <label for="pdf_upload_limit" class="block text-sm font-medium text-gray-700">PDF Upload Limit</label>
          <input type="number" name="pdf_upload_limit" id="pdf_upload_limit" autocomplete="pdf_upload_limit" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <div>
          <div>
        
          <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Submit
          </button>
        </div>
      </form>
    </div>
  </div>
</x-super-layout>