<!DOCTYPE html>
<html lang="en">

<head>

@include('includes.head')

</head>

<body>

<header>

@include('includes.mainmenu')

</header>

<hr>

@yield('mainslider', 'tidak ada slider')

<!-- start container -->
<div class="container">

<div id="mainbody"> <!-- konten -->

    <div class="row">
    @yield('content', 'tidak ada konten')
    </div>
    
</div> <!-- end konten -->

<hr>

<!-- start footer -->
<footer>

@include('includes.footer')

</footer>
<!-- end footer -->

</div> 
<!-- end container -->     

@section('script')
@include('includes.script')
@show

</body>

</html>
