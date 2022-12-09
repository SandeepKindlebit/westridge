<x-backend>
    @if(session('success'))
        <div class="mb-2 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative alert-dismissible fade show" role="alert">
          <span class="block sm:inline text-sm">{{session('success')}}</span>
          <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" data-bs-dismiss="alert" aria-label="Close"/></svg>
          </span>
          {{-- <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-yellow-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button> --}}
        </div>
      @endif
      @if(session('error'))
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">{{session('error')}}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
          <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
      </div>
    @endif

    <div class="max-w-screen-lg mx-auto p-5 border mt-5">
        <form class="w-full" method="post" action="{{ url('admin/contact') }}"  enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                        Email</label>
                    <input class="text-sm appearance-none block w-full bg-gray-200 text-gray-700 border  border-gray-400 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                        name="email" id="email" type="email" placeholder="Email" value="{{ $contact->email }}">
                    @error('email') <p class="text-red-500 text-xs">{{ $message }}</p>   @enderror
                </div>
                <div class="w-full md:w-1/3 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="phone">
                        Phone Number </label>
                    <input class="text-sm appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-400 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        name="phone" id="phone" type="text" placeholder="Phone" value="{{ $contact->contact_number }}">
                    @error('phone')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full md:w-1/3 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="other_phone">
                       Other Phone Number </label>
                    <input class="text-sm appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-400 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        name="other_phone" id="other_phone" type="text" placeholder="Other phone number" value="{{ $contact->other_contact_number }}">
                    @error('other_phone')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="Address">Address  </label>
                    <textarea name="address" id="editor" placeholder="Address"
                        class="text-sm  appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-400 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                      {!! $contact->address !!} </textarea>
                    @error('address')<p class="text-red-500 text-xs">{{ $message }}</p>    @enderror
                </div>

                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="pincode">
                        Pincode  </label>
                    <input class="text-sm appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-400 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        name="pincode" id="pincode" type="text" placeholder="Pincode" value="{{ $contact->pincode }}">
                    @error('pincode')<p class="text-red-500 text-xs">{{ $message }}</p>  @enderror
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="city">
                        City</label>
                    <input class="text-sm appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-400 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                        name="city" id="city" type="text" placeholder="City" value="{{ $contact->city }}">
                    @error('city') <p class="text-red-500 text-xs">{{ $message }}</p>   @enderror
                </div>
                <div class="w-full md:w-1/3 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="state">
                       State </label>
                    <input class="text-sm appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-400 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        name="state" id="state" type="text" placeholder="State" value="{{ $contact->state }}">
                        @error('state') <p class="text-red-500 text-xs">{{ $message }}</p>   @enderror
                </div>
                <div class="w-full md:w-1/3 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="country">
                      Country</label>
                    <input class="text-sm appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-400 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        name="country" id="country" type="text" placeholder="Country" value="{{ $contact->country }}">
                        @error('country') <p class="text-red-500 text-xs">{{ $message }}</p>   @enderror
                </div>

            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="working_days">
                        Working Days</label>
                    <input class="text-sm appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-400 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                        name="working_days" id="working_days" type="text" placeholder="Working Days" value="{{ $contact->working_days }}">
                    @error('working_days') <p class="text-red-500 text-xs">{{ $message }}</p>   @enderror
                </div>
                <div class="w-full md:w-1/3 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="working_time">
                       Working Time </label>
                    <input class="text-sm appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-400 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        name="working_time" id="working_time" type="text" placeholder="Working Hours" value="{{ $contact->working_time }}">
                    @error('working_time') <p class="text-red-500 text-xs">{{ $message }}</p>@enderror
                </div>
                <div class="w-full md:w-1/3 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="languages">
                        Languages we speak </label>
                    <input class="text-sm appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-400 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        name="languages" id="languages" type="text" placeholder="languages" value="{{ $contact->languages }}">
                    @error('languages')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <div class="flex justify-between w-full px-3">
                <button
                    class="mt-4 shadow bg-indigo-600 hover:bg-indigo-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-6 rounded"
                    type="submit"> Submit</button>
            </div>
        </form>
    </div>
</x-backend>
