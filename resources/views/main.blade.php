<!DOCTYPE html>
<html lang="en">
<head>
   @include('head')
</head>
<body>

@include('navbar')
    <div class="container-fluid">
        
        <div id="app">
            @yield('contents')
        </div>


    </div>

    @include('script')


</body>
</html>
