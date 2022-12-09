<div>  
    <form wire:submit.prevent="submit">
        <div class="mb-3">
            <x-backend.form.input type="text" name="heading"
                                  required
                                  class="w-full"
                                  name="project.heading"
                                  wire:model.defer="project.heading"
                                  aria-label="Heading"
                                  placeholder="*Heading..."/>
        </div>

        <div class="mb-3">
            <x-backend.form.select name="category" required
                                   wire:model.defer="project.category_id"
                                   aria-label="Category">
                <option value="">*Select Category</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </x-backend.form.select>
        </div>

        <div class="mb-3">
            <x-backend.form.textarea class="w-full" required
                                     name="project.content"
                                     wire:model.defer="project.content"
                                     aria-label="Content" rows="12"
                                     placeholder="*Content"></x-backend.form.textarea>
        </div>

        {{-- <div class="mb-3">
            <x-backend.form.input class="w-full"
                                  type="text"
                                  name="project.keywords"
                                  wire:model.defer="project.keywords"
                                  placeholder="Keywords" aria-label="Keywords"/>
        </div> --}}

        <div class="mb-3">
            <x-backend.form.select required
                name="category"
                wire:model.defer="project.language" aria-label="*Language">
                <option value="">*Select Language</option>
                @foreach(config('fields.lang') as $key => $language)
                    <option value="{{$key}}">{{$language}}</option>
                @endforeach
            </x-backend.form.select>
        </div>
        <div class="mb-3">
            <div class="flex">
             
                <div class="mb-3 w-96">
                    @if ($project)
                    <div>
                        @php
                            $image = \App\Models\ProjectImage::where('project_id','=',$project['id'] ?? '')->first('path');
                        @endphp
                         @if ($image)
                            <img src="{{ asset('storage/'.$image->path) }}" alt="">
                         @endif 
                    </div>
                @endif
                  <label for="formFileLg" class="form-label inline-block mb-2 text-gray-700">Image* </label>
                  <input type="file" wire:model="project.photo" name="photo" id="image" class="form-control
                  block
                  w-full
                  px-2
                  py-1.5
                  text-xl
                  font-normal
                  text-gray-700
                  bg-white bg-clip-padding
                  border border-solid border-gray-300
                  rounded
                  transition
                  ease-in-out
                  m-0
                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                </div>
              </div>             
        </div>
      
        {{-- <div class="mb-3">
            <input type="checkbox"
                   name="project.is_comment_enabled"
                   id="is-comment-enabled"
                   wire:model.defer="project.is_comment_enabled"
                   aria-label="Comment Enable">
            <label for="is-comment-enabled">Comment enable</label>
        </div> --}}

        <x-backend.form.button>Submit</x-backend.form.button>
    </form>
</div>

