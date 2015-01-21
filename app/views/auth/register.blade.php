@extends('_layout/admin')

@section('css')
@parent
@stop

@section('content')

@if ($errors->any())
<ul>
	@foreach ($errors->all() as $error)
	<li>{{ $error }}</li>
	@endforeach
</ul>
@endif


<h3>Daftarkan User Baru</h3>
{{ Form::open(array('url'=>'/admin/register')) }}
	<div class="form-group">
		{{ Form::label('name', 'Nama: ',[]) }}
		{{ Form::text('nama', null, ['class'=>'form-control', 'style'=>'width:300px']) }}
	</div>
	<div class="form-group">
	{{ Form::label('username', 'Username: ',[]) }}
	{{ Form::text('username', null, ['class'=>'form-control', 'style'=>'width:300px']) }}
	</div>
	<div class="form-group">
		{{ Form::label('email', 'Email: ',[]) }}
		{{ Form::text('email', Input::old('email'), ['class'=>'form-control', 'style'=>'width:300px']) }}
	</div>
	<div class="form-group">
		{{ Form::label('password', 'Password: ',[]) }}
		{{ Form::password('password', ['class'=>'form-control','style'=>'width:300px']) }}
	</div>
	<div class="form-group">
		{{ Form::label('konfirmasi_password', 'Konfirmasi Password: ',[]) }}
		{{ Form::password('password_confirmation', ['class'=>'form-control','style'=>'width:300px']) }}
	</div>
	<div class="form-group">
		{{ Form::submit('Register', ['class'=>'btn btn-primary']) }}
		{{ Form::submit('Cancel', ['class'=>'btn btn-danger']) }}
	</div>

{{ Form::close() }}
@stop
