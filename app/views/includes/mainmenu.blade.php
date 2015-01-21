<!-- Section MainMenu -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse-menu">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->

    <div class="collapse navbar-collapse" id="collapse-menu">
      <ul class="nav navbar-nav">
      <li class="active"><a href="{{ URL::route('homepage') }}">{{ trans('menu.home') }}<span class="sr-only">(current)</span></a></li>
      @if (Lang::getLocale()=='id')
      <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ trans('menu.profil') }}<span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
          @foreach($semua_profil as $profil)
          <li><a href="{{ URL::to('/profil')}}/{{ $profil->slug }}">{{ $profil->judul }}</a></li>
          @endforeach
        </ul>
      </li>
      <li><a href="{{ URL::route('berita.index') }}">{{ trans('menu.berita') }}</a></li>
      @elseif (Lang::getLocale()=='en')
      <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ trans('menu.profil') }}<span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
          @foreach($about as $profil)
          <li><a href="{{ URL::to('/en/about')}}/{{ $profil->slug }}">{{ $profil->judul }}</a></li>
          @endforeach
        </ul>
      </li>
      <li><a href="{{ URL::route('berita.index_en') }}">{{ trans('menu.berita') }}</a></li>
      @endif
      <li><a href="#">{{ trans('menu.event') }}</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      {{ Form::open(array('route'=>'search', 'class'=>'navbar-form', 'role'=>'search')) }}
        <div class="input-group">
      {{ Form::text('cari', null, array('class'=>'form-control')) }}
        <div class="input-group-btn">
      {{ Form::button('Search',array('type' =>'submit', 'class'=>'btn btn-default')) }}
        </div>
        </div>
        @if(Auth::guest())
        <a class="btn btn-success" href="{{ URL::route('login') }}">Login</a>
        @else
        <a class="btn btn-danger" href="{{ URL::route('admin') }}">{{ trans('menu.dashboard') }}</a>
        @endif
        @if (Lang::getLocale()=='id')
        <a href="{{ URL::to('/en') }}"><img src="{{{ asset('img/usa.png') }}}"></a>
        @elseif (Lang::getLocale()=='en')
        <a href="{{ URL::to('/') }}"><img src="{{{ asset('img/indonesia.png') }}}"></a>
        @endif
        {{ Form::close() }}
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!-- End Section MainMenu -->

