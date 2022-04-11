<x-guest-layout>
    <div class="min-h-screen flex flex-col">
    @include('site-navigation')
        <div class="bg-blue-200 flex-grow p-8 text-1xl">          
            @livewire('contact-update', ['contact_id' => $contact_id])
        </div>
        <div class="bg-indigo-900 text-gray-400 px-4 py-4 font-normal">
            <p class="text-center">Copyright © {{ date('Y') }}. All rights reserved.</p>
        </div>
    </div>
</x-guest-layout>