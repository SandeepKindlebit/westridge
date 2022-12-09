@props(['isMobile' => false])
<!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->

@php
    $menus = [
        // 'Projects' => route('backend.project.index'),
        'Articles' => route('backend.article.index'),
        'Comments' => route('backend.comment.index'),
        'Users' => route('backend.user.index'),
        'Categories' => route('backend.category.index'),
        'Keywords' => route('backend.keyword.index'),
        'Feedback' => route('backend.feedback.index'),
        'Subscribers' => route('backend.subscriber.index'),
        ];
@endphp

@foreach($menus as $menu => $url)
    @php
        $isActive = request()->url() == $url;
    @endphp

    {{-- <a href="{{$url}}" @class([
        'px-6 py-2 rounded-md font-medium',
        'text-sm' => !$isMobile,
        'text-base block' => $isMobile,
        'bg-gray-900 text-white' => $isActive,
        'text-gray-300 hover:bg-gray-700 hover:text-white' => !$isActive,
    ])> --}}

 <a href="{{$url}}"   @class([
        'inline-flex items-center py-3 text-gray-400 bg-gray rounded-lg px-1',
        'text-sm' => !$isMobile,
        'text-base block' => $isMobile,
        'bg-gray-900 text-white' => $isActive,
        'text-gray-300 hover:bg-gray-700 hover:text-white' => !$isActive,
    ])>
     <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24">
        <path d="M9,10h1a1,1,0,0,0,0-2H9a1,1,0,0,0,0,2Zm0,2a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2ZM20,8.94a1.31,1.31,0,0,0-.06-.27l0-.09a1.07,1.07,0,0,0-.19-.28h0l-6-6h0a1.07,1.07,0,0,0-.28-.19.32.32,0,0,0-.09,0A.88.88,0,0,0,13.05,2H7A3,3,0,0,0,4,5V19a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V9S20,9,20,8.94ZM14,5.41,16.59,8H15a1,1,0,0,1-1-1ZM18,19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V5A1,1,0,0,1,7,4h5V7a3,3,0,0,0,3,3h3Zm-3-3H9a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2Z" />
      </svg>

<span class="mx-5">{{$menu}}</span>
        {{-- {{$menu}} --}}

    </a>

@endforeach
{{-- <a href="#" class="inline-flex items-center py-3 text-blue-600 bg-white rounded-lg px-2"
                :class="{ 'justify-start': menu, 'justify-center': menu == false }">
                <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
                <span class="ml-2" x-show="menu">
                    <x-backend.navbar.navs></x-backend.navbar.navs>
                </span>
            </a> --}}
