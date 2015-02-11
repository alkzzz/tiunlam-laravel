@extends('_layout/admin')

@section('content')
<h1>Selamat Datang, {{ Auth::user()->nama }} </h1>
<h1>Ini Halaman Administrasi Website</h1>
@stop