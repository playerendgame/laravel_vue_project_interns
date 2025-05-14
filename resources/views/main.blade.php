<!DOCTYPE html>
<html lang="en">
<head>
   @include('head')
</head>
<body>

@include('navbar')
    <div class="container-fluid">
        
        @yield('contents')

    </div>

    @include('script')


</body>
</html>
