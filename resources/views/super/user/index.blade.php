<x-super-layout dir="rtl">
<div class="flex flex-col mt-4">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50 tesxt">
                        <tr>
                            <th scope="col" class="px-3 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                الايميل
                            </th>
                            <th scope="col" class="px-3 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                الاسم
                            </th>
                            <th scope="col" class="px-3 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                              تفعيل الايميل 
                            </th>
                            <th scope="col" class="px-3 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                              عدد credits
                            </th>
                            <th scope="col" class="px-3 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                تاريخ الانشاء
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($users as $user)
                            <tr>
                                <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$user->email}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$user->name}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$user->email_verified_at}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$user->credits}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$user->created_at}}
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