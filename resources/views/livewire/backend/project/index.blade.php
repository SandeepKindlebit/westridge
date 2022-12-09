<div>
    <section class="flex justify-between mb-3 px-1">
        <form>
            <x-backend.form.input name="query" wire:model.debounce="query" placeholder="Search article" autofocus/>
            <select name="category" wire:model.lazy="category" aria-label="Category"
                    class="p-1 border border-indigo-300 rounded focus:outline-none focus:border-indigo-500">
                <option value="">All categories</option>
                @foreach($navCategories as $category)
                    <option value="{{$category->id}}" {{request('category') == $category->id ? 'selected' : ''}}>
                        {{$category->name}}
                    </option>
                @endforeach
            </select>
        </form>

        <a href="{{route('backend.project.create')}}" class="border border-indigo-300 rounded px-2">+ Add New</a>
    </section>

    <section wire:loading.class="opacity-50">
        <x-backend.table>
            <x-slot name="head">
                <tr>
                    <x-backend.table.th>Image</x-backend.table.th>
                    <x-backend.table.th>Title</x-backend.table.th>
                    <x-backend.table.th>Publication</x-backend.table.th>
                    <x-backend.table.th>Operations</x-backend.table.th>
                </tr>
            </x-slot>

            <x-slot name="body">                
                @forelse($project as $article)              
               <livewire:backend.project.index-row :project="$article->id" wire:key="{{$article->id}}" />
                @empty
                    <tr>
                        <x-backend.table.td colspan="100" class="text-gray-500 text-center">No article found</x-backend.table.td>
                    </tr>
                @endforelse
            </x-slot>
        </x-backend.table>

        <section class="pt-3">
            {{$project->links()}}
        </section>
    </section>
</div>
