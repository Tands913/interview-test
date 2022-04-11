<div>
  <form class="w-full max-w-lg mx-auto" wire:submit.prevent="addContact">
  <h1 class="mb-5 text-2xl">
      Create the Contact
    </h1>
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
          First Name
        </label>
        <input id="firstname" wire:model.defer="firstname"
          class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
          id="grid-first-name" type="text" placeholder="Jane">
        @error('firstname')
        <p class='text-sm text-red-600'>{{ $message }}</p>
        @enderror
      </div>
      <div class="w-full md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
          Last Name
        </label>
        <input id="lastname" wire:model.defer="lastname"
          class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
          id="grid-last-name" type="text" placeholder="Doe">
        @error('lastname')
        <p class='text-sm text-red-600'>{{ $message }}</p>
        @enderror
      </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
          Email
        </label>
        <input id="email" wire:model.defer="email"
          class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
          id="grid-email" type="email" placeholder="examples@xxx.xxx">
        <p class="text-gray-600 text-xs italic">Please enter your email address</p>
        @error('email')
        <p class='text-sm text-red-600'>{{ $message }}</p>
        @enderror
      </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
          Phone Number
        </label>
        <input id="phone_num" wire:model.defer="phone_num"
          class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
          id="grid-password" type="number" placeholder="Enter numeric value">
        <p class="text-gray-600 text-xs italic">Please enter your phone number</p>
        @error('phone_num')
        <p class='text-sm text-red-600'>{{ $message }}</p>
        @enderror
      </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
          Contact image
        </label>
        <input id="img_file" type="file" class="mt-1 block w-full" wire:model="img_file" enctype='multipart/form-data'
          accept='.jpg, .jpge, .png' required />
        <p class="text-gray-600 text-xs italic">Please upload the image file</p>

        @if(isset($img_file))
          <label class="my-5" for="plot_image" value="{{ __('Uploaded Image: ').$img_file->getClientOriginalName() }}" />
          <img id="plot_image" src="{{ $img_file->temporaryUrl() }}" alt="Something Wrong to Display Image">
        @endif
      </div>

    </div>

    <div wire:loading.remove>
      <button type="submit"
        class="block mx-auto bg-red-600 text-white font-semibold mt-5 py-2 px-4 rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200">Submit
        Contact</button>
    </div>

  </form>
</div>