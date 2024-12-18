<x-super-layout dir="rtl">
    <div class="flex flex-col mt-4">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 tesxt">
                            <tr>
                                <th scope="col" class="px-3 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ip address
                                </th>
                              
                               
                                <th scope="col" class="px-3 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    تاريخ الانشاء
                                </th>
                               
                                <th scope="col" class="px-3 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    اجراء
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($ips as $ip)
                                <tr>
                                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{$ip->ip_address}}
                                    </td>
                                  
                             
                                 
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{$ip->created_at}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <form action="{{route('super.ip.delete', $ip->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="text-red-600 hover:text-red-900">حذف</button>
                                        </form>
                                 
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-8">
                    {{ $ips->links() }}
                </div>
            </div>
        </div>
    </div>
      
    </x-super-layout>