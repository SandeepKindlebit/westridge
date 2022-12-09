{{-- @props(['wrap' => false])
<td {{$attributes->merge(['class' => "px-6 py-4 ".($wrap ? '' : 'whitespace-no-wrap')])}}>
    {{$slot}}
</td> --}}


@props(['wrap' => false])
<td {{$attributes->merge(['class' => "px-6 py-4 whitespace-no-wrap border-b border-gray-500 ".($wrap ? '' : 'whitespace-no-wrap')])}}>
    <div class="flex items-center">
        <div>
            <div class="text-sm leading-5 text-gray-800">{{$slot}}</div>
        </div>
    </div>
</td>


