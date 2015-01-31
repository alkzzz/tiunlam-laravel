<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<link href="{{{ asset('css/admin.css') }}}" rel="stylesheet">
@section('title')
<title>Halaman Admin</title>
@stop
</head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            @if( Auth::check())
            <a class="navbar-brand" href="{{ URL::route('homepage') }}">Halo, {{ Auth::user()->username }} </a>
             @endif
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          {{ Form::open(array('route'=>'search', 'class'=>'navbar-form navbar-right', 'role'=>'search')) }}
          <div class="input-group">
          {{ Form::text('cari', null, array('class'=>'form-control')) }}
            <div class="input-group-btn">
          {{ Form::button('Search',array('type' =>'submit', 'class'=>'btn btn-default')) }}
            </div>
          {{ Form::close() }}
        </div>
      </div>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <div id="sidebar" class="col-sm-3 col-md-2 navbar-collapse collapse sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="{{ URL::route('admin') }}">Dashboard <span class="sr-only">(current)</span></a></li>
            <li><a href="{{ URL::route('daftar_profil') }}">Profil</a></li>
            <li><a href="{{ URL::route('daftar_berita') }}">Berita</a></li>
            <li><a href="#">Pengumuman</a></li>
            <li><a href="{{ URL::route('register') }}">Daftarkan User Baru</a></li>
            <li><a href="{{ URL::route('homepage') }}">Kembali ke Halaman Utama</a></li>
            <li><a href="{{ URL::route('logout') }}">Logout</a></li>
        </div>
    <div id="mainbody" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <!-- <h1 class="page-header">Dashboard</h1> -->
          @yield('content')
    </div>
<hr>
<footer class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

</footer>

@section('script')
@include('includes.script')
@show


  </body>
</html>
