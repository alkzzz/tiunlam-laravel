@extends('_layout/leftsidebar')

@section('content')
@if (Lang::getLocale()=='id')
<h2>Daftar Skripsi</h2>
@if ($daftar_skripsi->count())
    @foreach($daftar_skripsi as $skripsi)
    <h4><a href="{{URL::to('/')}}/skripsi/{{$skripsi->id}}">{{ $skripsi->judul }}</a></a></h4>
    @endforeach
@else
    Tidak ada berita.
@endif
@endif
@stop

@section('script')
@parent
@stop


