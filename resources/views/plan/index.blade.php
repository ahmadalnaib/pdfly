<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    Plans
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">
          @foreach ($plans as $plan)
        <div>
          <h2 class="text-2xl font-bold">{{ $plan->name }}</h2>
          <p class="text-lg">{{ $plan->description }}</p>
          <p class="text-lg">{{ $plan->price }}</p>

          <form action="{{ route('checkout.index', $plan->slug) }}" method="POST">
            @csrf
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
              Checkout
            </button>
          </form>
          
       
        </div>
              
          @endforeach
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
