<div x-data="{ open: false }" class="sticky top-0 z-50 bg-indigo-900 px-4 py-4">
    <div class="md:w-1xl lg:mx-auto lg:flex md:items-center md:justify-between">
        <div class="flex justify-between items-center">
            <a href="/contact/show" class="inline-block py-2 text-white text-3xl font-bold">
                <h1>Contact App</h1>
            </a>
            <div class="inline-block cursor-pointer lg:hidden" @click="open = !open">
                <div class="bg-gray-400 w-8 mb-2" style="height: 2px;"></div>
                <div class="bg-gray-400 w-8 mb-2" style="height: 2px;"></div>
                <div class="bg-gray-400 w-8" style="height: 2px;"></div>
            </div>
        </div>


        <div :class="{ 'hidden': !open }" class="text-white hidden lg:block">
            <a href="{{ url('/contact/show') }}" class="mr-5 {{request()->routeIs('contact.show') ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 focus:outline-none focus:border-indigo-700 transition' : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 hover:border-gray-300 focus:outline-none focus:border-gray-300 transition'}}">
                Show Contacts
            </ak>
            <a href="{{ url('/contact/create') }}" class="{{request()->routeIs('contact.create') ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 focus:outline-none focus:border-indigo-700 transition' : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 hover:border-gray-300 focus:outline-none focus:border-gray-300 transition'}}">
                Create Contact
            </a>
        </div>
    </div>
</div>
