<div>
  <form class="w-full max-w-lg mx-auto" wire:submit.prevent="updateContact">
    <h1 class="mb-5 text-2xl">
      Update the Contact
    </h1>
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="firstname">
          First Name
        </label>
        <input id="firstname" wire:model.defer="firstname"
          class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
          type="text" placeholder="Jane">
        @error('firstname')
        <p class='text-sm text-red-600'>{{ $message }}</p>
        @enderror
      </div>
      <div class="w-full md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="lastname">
          Last Name
        </label>
        <input id="lastname" wire:model.defer="lastname"
          class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
          type="text" placeholder="Doe">
        @error('lastname')
        <p class='text-sm text-red-600'>{{ $message }}</p>
        @enderror
      </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
          Email
        </label>
        <input id="email" wire:model.defer="email"
          class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
          type="email" placeholder="examples@xxx.xxx">
        <p class="text-gray-600 text-xs italic">Please enter your email address</p>
        @error('email')
        <p class='text-sm text-red-600'>{{ $message }}</p>
        @enderror
      </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="phone_num">
          Phone Number
        </label>
        <input id="phone_num" wire:model.defer="phone_num"
          class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
          type="number" placeholder="Enter numeric value">
        <p class="text-gray-600 text-xs italic">Please enter your phone number</p>
        @error('phone_num')
        <p class='text-sm text-red-600'>{{ $message }}</p>
        @enderror
      </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="img_file">
          Contact image
        </label>
        <input id="img_file" type="file" class="mt-1 block w-full" wire:model="img_file" enctype='multipart/form-data'
          accept='.jpg, .jpge, .png' />
        <p class="text-gray-600 text-xs italic">Please upload the image file</p>
      </div>

      @if(isset($img_file))
          <label class="my-5" for="plot_image" value="{{ __('Uploaded Image: ').$img_file->getClientOriginalName() }}" />
          <img id="plot_image" src="{{ $img_file->temporaryUrl() }}" alt="Something Wrong to Display Image">
          
      @elseif($contact->img_path)
          <label class="my-5" for="plot_image" value="{{ __('Plot Image: ') }}" />
          <img id="plot_image" src="{{ asset(Storage::disk('local')->url($contact->img_path)) }}" alt="Something Wrong to Display Image">
      @endif
    </div>

    <div wire:loading.remove>
      <button type="submit"
        class="inline-block mx-auto bg-red-600 text-white font-semibold mt-5 py-2 px-4 rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200">Update
        Contact</button>
        <div class="inline-block">
          {{ $updateSuccess }}
        </div>
    </div>

  </form>
</div>
