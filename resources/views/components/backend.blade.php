<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('build/css/app.css') }}">

    <link rel="stylesheet" href="{{ asset('css/prism.css') }}" />

    <link rel="shortcut icon" type="image/png" href="{{ asset('img/favicon.png') }}" />

    <title>{{ $globalConfigs->site_title }}</title>

    @livewireStyles
</head>


<body class="flex bg-gray-100 min-h-screen" x-data="{ panel: false, menu: true }">
       <x-backend.sidebar/>
    <div class="flex-grow text-gray-800">
        <x-backend.header/>
        <main class="p-6 sm:p-10 space-y-6">
            <div class="sm:px-6 lg:px-8 py-3">
                {{-- <x-backend.sidebar/> --}}
                {{ $slot }}
            </div>
        </main>
    </div>


    {{--
<x-backend.navbar/>


<div class="sm:px-6 lg:px-8 py-3">
    <x-backend.sidebar/>
    {{$slot}}
</div> --}}

    @livewireScripts
    <script src="{{ mix('build/js/app.js') }}"></script>
    <script src="{{ asset('js/prism.js') }}" defer></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    {{-- script for drop down of static pages --}}
    <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
        </script>

<script
  src="https://code.jquery.com/jquery-3.6.1.min.js"
  integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
  crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
    $('#geturl').on('blur keyup', function() {
      var pagUrl = $('#geturl').val();
          pagUrl = pagUrl.toLowerCase();
          pagUrl = pagUrl.replace(/[^a-zA-Z0-9]+/g,'-');
        if (pagUrl !='') {

       $('#page_url').val(pagUrl);
     }

   });
  });
 </script>



</body>

</html>
