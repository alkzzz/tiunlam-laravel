@extends('_layout/admin')

@section('content')
<div id="lang-tab" style="margin-top:20px">
<ul class="nav nav-tabs">
  <li role="presentation" class="active"><a data-toggle="tab" href="#indonesia">Indonesia</a></li>
  <li role="presentation"><a data-toggle="tab" href="#english">English</a></li>
</ul>
</div>
<div class="tab-content">
<!--tab edit bahasa indonesia -->
<div id="indonesia" class="tab-pane fade in active">
<h3>Daftar Profil</h3>
@if ($semua_profil->count())
    <table class="table table-bordered table-hover table-condensed">
        <thead>
        <tr>
        <th class="info" style="text-align:center">Judul profil</th>
        <th class="info" colspan="2" style="text-align:center">Action</th>
        </tr>
        </thead>

        <tbody>
            @foreach ($semua_profil as $profil)
            <tr>
          <td style="vertical-align:middle"><a href="{{ URL::to('/admin/profil') }}/{{ $profil->slug }}"> {{ $profil->judul }}</h4></td>
          <td style="text-align:center;vertical-align:middle">{{ link_to_route('edit_profil', 'Edit', array($profil->slug), array('class' => 'btn btn-info')) }}</td>
          <td style="text-align:center; width:26%">
            {{ Form::open(array('style'=>'margin:0 auto', 'method'=> 'DELETE', 'route'=> array('delete_profil', $profil->slug))) }}
            {{ Form::submit('Delete', array('id'=>'confirm', 'class'=> 'btn btn-danger', 'data-toggle'=>'confirmation', 'data-popout'=>'true')) }}
            {{ Form::close() }}
          </td>
          </tr>
            @endforeach
        </tbody>
    </table>
@else
    Tidak ada profil.
@endif
{{ link_to_route('tambah_profil', 'Tambah', null, array('class' => 'btn btn-success')) }}
</div>
<div id="english" class="tab-pane fade">
<h3>All Profiles</h3>
@if ($all_profile->count())
    <table class="table table-bordered table-hover table-condensed">
        <thead>
        <tr>
        <th class="info" style="text-align:center">Judul profil</th>
        <th class="info" colspan="2" style="text-align:center">Action</th>
        </tr>
        </thead>

        <tbody>
            @foreach ($all_profile as $profil)
            <tr>
          <td style="vertical-align:middle"><a href="{{ URL::to('/admin/en/about') }}/{{ $profil->slug }}"> {{ $profil->judul }}</a></td>
          <td style="text-align:center;vertical-align:middle">{{ link_to_route('edit_profil_en', 'Edit', array($profil->slug), array('class' => 'btn btn-info')) }}</td>
          <td style="text-align:center; width:26%">
            {{ Form::open(array('style'=>'margin:0 auto', 'method'=> 'DELETE', 'route'=> array('delete_profil', $profil->slug))) }}
            {{ Form::submit('Delete', array('id'=>'confirm', 'class'=> 'btn btn-danger', 'data-toggle'=>'confirmation', 'data-popout'=>'true')) }}
            {{ Form::close() }}
          </td>
          </tr>
            @endforeach
        </tbody>
    </table>
@else
    No Profiles.
@endif
{{ link_to_route('tambah_profil_en', 'Tambah', null, array('class' => 'btn btn-success')) }}
</div>
</div>

@stop

@section('script')
@parent
<script type="text/javascript" src="{{{ asset('js/bootstrap-confirmation.min.js') }}}"></script>
<script type="text/javascript">
$('[data-toggle="confirmation"]').confirmation('hide');
</script>
@stop

</body>
</html>

