<div>
    @include('filterBar')
    <table class="min-w-full leading-normal text-center">
        <thead>
            <tr>
                <th
                    class="px-5 py-3 border-b-2 border-gray-300 bg-gray-200 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Contact ID
                    @include('backend-order-bar', ['columnName' => 'id'] )
                </th>
                
                <th
                    class="px-5 py-3 border-b-2 border-gray-300 bg-gray-200 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    First Name
                    @include('backend-order-bar', ['columnName' => 'firstname'] )
                </th>
                <th
                    class="px-5 py-3 border-b-2 border-gray-300 bg-gray-200 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Last Name 
                    @include('backend-order-bar', ['columnName' => 'lastname'] )
                </th>
                    
                <th
                    class="px-5 py-3 border-b-2 border-gray-300 bg-gray-200 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Email 
                    @include('backend-order-bar', ['columnName' => 'email'] )
                </th>
                    
                <th
                    class="px-5 py-3 border-b-2 border-gray-300 bg-gray-200 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Phone Number 
                    @include('backend-order-bar', ['columnName' => 'phone_num'] )
                </th>

                <th
                    class="px-5 py-3 border-b-2 border-gray-300 bg-gray-200 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                </th>

            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $myContact)
                <tr class="bg-white">

                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-10 h-10">
                                @if($myContact->img_path)
                                <img class="w-full h-full rounded-full"
                                    src="{{ asset(Storage::disk('local')->url($myContact->img_path)) }}"
                                    alt="">
                                @else
                                <img class="w-full h-full rounded-full" src="https://ui-avatars.com/api/?name={{$myContact->firstname . ' ' . $myContact->lastname}}&color=7F9CF5&background=EBF4FF" alt="{{$myContact->firstname . '' . $myContact->lastname}}">
                                @endif
                            </div>

                            <div class="ml-3">{{$myContact->id}}</div>
                        </div>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">{{ $myContact->firstname}}</td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">{{ $myContact->lastname }}</td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">{{ $myContact->email }}</td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">{{ $myContact->phone_num }}</td>

                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                        <div class="flex justify-center">
                            
                            <a href="/contact/update/{{$myContact->id}}" class="inline-flex items-center px-1 py-1 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition" title="Edit Contact">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>

                            <form method="post" action="/contact/delete/{{$myContact->id}}" class="inline">
                                @csrf
                                <button class="ml-2 inline-flex items-center px-1 py-1 border border-red-300 rounded-md bg-red-500 font-semibold text-xs text-white tracking-widest shadow-sm hover:bg-red-300 focus:outline-none focus:ring disabled:opacity-25 transition" title="Delete This Contact"
                                wire:loading.attr="disabled">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-3">
        {{ $contacts->links() }} 
    </div>
</div>
