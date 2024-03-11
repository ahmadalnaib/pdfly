<x-super-layout dir="rtl">


<div class="flex flex-row mb-10">
    <a href="{{route('plan.create')}}" class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
        <svg class="-ml-0.5 mr-1.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
        </svg>
        اضافة خطة
      </a>
</div>
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50 tesxt">
                        <tr>
                            <th scope="col" class="px-3 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                             الاسم
                            </th>
                            <th scope="col" class="px-3 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                               الوصف
                            </th>
                            <th scope="col" class="px-3 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                             السعر
                            </th>
                            <th scope="col" class="px-3 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                              عدد الرصيد
                            </th>
                            <th scope="col" class="px-3 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                             مفعل
                            </th>
                            <th scope="col" class="px-3 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                             حجم الرفع 
                            </th>
                            <th scope="col" class="px-3 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                          التعديل
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($plans as $plan)
                            <tr>
                                <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$plan->name}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$plan->description}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$plan->price}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$plan->credits}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$plan->live}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$plan->pdf_upload_limit}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div class="flex items-center space-x-4">
                                        <a href="{{route('plan.edit', $plan->slug)}}" class="px-2 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                              </svg>
                                              
                                        </a>
                                
                                       <div class="p-2">
                                        <form action="{{route('plan.destroy', $plan->slug)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button  onclick="return confirm('هل متاكد من المسح 😨')"  type="submit" class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-500">
                                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </form>
                                       </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
  
</x-super-layout>