<x-backend>
    <div class="max-w-screen-md mx-auto p-5 border mt-5">
        {{-- <div class="text-center mb-16">
            <p class="mt-4 text-sm leading-7 text-gray-500 font-regular uppercase">
                Contact
            </p>
            <h3 class="text-3xl sm:text-4xl leading-normal font-extrabold tracking-tight text-gray-900">
                Get In <span class="text-indigo-600">Touch</span>
            </h3>
        </div> --}}

        <form class="w-full" method="post" action="{{ url('admin/edit-page/' . $result->id) }}"  enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="geturl">Name
                    </label>

                    <input
                        class="text-sm appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        name="name" id="geturl" type="text" placeholder="Name" value="{{ $result->name }}">
                    @error('name')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                    {{-- border-red-500 --}}
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="page_url">
                        Url </label>
                    <input
                        class="text-sm appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        name="url" id="page_url" type="text" placeholder="Url" value="{{ $result->url }}">
                    @error('url')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-password">Your Message </label>
                    <textarea rows="5" name="content" id="editor"
                        class="text-sm  appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            {!! $result->content !!} </textarea>
                    @error('content')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="image">
                        Upload Image
                    </label>
                    <input
                        class="text-sm  appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        name="about_image" id="about_image" type="file" placeholder="Url">
                    {{-- <p class="mt-1 text-xs text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p> --}}
                    @error('about_image')<p class="text-red-500 text-xs">{{ $message }}</p> @enderror
                    @if (!empty($result->about_image))
                    <div class="mt-5 p-2">
                       <img src="{{ url('public/backend/images/pages_images/'.$result->about_image) }}" alt="" height="200px" width="400px">
                    </div>
                       @endif
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="status">
                        Status </label>
                    <div class="relative">
                        <select
                            class="text-sm block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            name="status" id="status">
                            <option value="Active" {{ $result->status == 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Inactive" {{ $result->status == 'Inactive' ? 'selected' : '' }}>Inactive
                            </option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                        @error('status')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
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
