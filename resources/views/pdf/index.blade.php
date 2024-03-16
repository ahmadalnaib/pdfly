


<x-app-layout dir="rtl">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            وثائق
        </h2>
    </x-slot>
    <div class="py-12 px-4 sm:px-0">
        @if(auth()->user()->credits > 0)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                <div class="text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                    </svg>
                    @if($docs->isEmpty())
                    <h3 class="mt-2 text-sm font-semibold text-gray-900">لا وثائق</h3>
                    <p class="mt-1 text-sm text-gray-500">استعد لرفع وثيقة جديد</p>
                    @endif
                    <div class="mt-6">
                        <a href="{{route('pdf.create')}}" type="button" class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        <svg class="-ml-0.5 mr-1.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                        </svg>
                       مشروع جديد
                      </a>
                    </div>
                  </div>
                  
            </div>
        </div>
        @else
        <div class="bg-white p-4 sm:p-8 rounded-lg shadow-md w-full max-w-2xl mx-auto">
            <p class="mb-4">ليس لديك أي رصيد لرفع ملفات pdf.</p>
            <p class="mb-4">انضم إلى آلاف العملاء السعداء من خلال شراء المزيد أدناه.</p>
            <a href="{{route('checkout')}}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                شراء الرصيد
            </a>
        </div>
        @endif
    </div>

  
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white">
        <ul role="list" class="divide-y divide-gray-100">
            @foreach ($docs as $doc)
            <li class="flex items-center justify-start gap-x-0 py-5 px-4 sm:px-0">
                    <div class="flex justify-between w-full">
                        <div class="min-w-0">
                            <div class="flex items-end gap-x-0">
                                <p class="text-sm font-semibold leading-6 text-gray-900">{{ $doc->original_name }}</p>
                             
                            </div>
                          
                         
                        </div>
                        <div class="flex items-center space-x-4">
                            <a href="{{route('pdf.show', $doc->slug)}}"
                                class="block rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:block">عرض
                                <span class="sr-only">, {{ $doc->title }}</span></a>
                            <div class="relative flex-none" x-data="{ open: false }">
                                <button @click="open = !open" type="button"
                                    class="-m-2.5 block p-2.5 text-gray-500 hover:text-gray-900">
                                    <span class="sr-only">Open options</span>
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path
                                            d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
                                    </svg>
                                </button>
                                <!-- Dropdown menu -->
                                <div x-show="open" @click.away="open = false"
                                class="absolute left-0 z-10 mt-2 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none">
                            
                                <form action="{{ route('pdf.destroy', $doc->slug) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('هل متاكد من المسح 😨')" type="submit" 
                                        class="w-full px-2 py-1 text-sm text-white bg-red-500 hover:bg-red-700 rounded transition-colors duration-200 ease-in-out">
                                        مسح الوثيقة
                                    </button>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </li>
              
                @endforeach
            </ul>
            @if($docs->count() > 0)
            <div class="py-4">
                {!! $docs->links() !!}
            </div>
        @endif
        </div>
        </div>

    </x-app-layout>
