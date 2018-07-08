<!doctype html>
<html>
<head>
    @include('Includes.head')
</head>
<body style="padding-top: 120px;">
    @include('includes.header')
<div class="container">

    
    
    
        <div id="main" class="row">

            @yield('content')

    </div>

    <footer class="row" style="padding-top: 100px;">
        @include('includes.footer')
    </footer>

</div>
</body>
</html>
