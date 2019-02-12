<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script>
        window.Laravel = {csrf_token: '{{ csrf_token() }}' };
        @auth
            window.auth = true;
        @else
            window.auth=false;
        @endauth
    </script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

 </head>

<body  class="mdc-typography" style="margin:0px;">
   <div id="app">
        <navbar></navbar>
        <drawer-principal></drawer-principal>        
        <main class="main-content" id="main-content" style="margin: 0px; " >
            
                @yield('content')
            
        </main>
   </div>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
</body>

</html>