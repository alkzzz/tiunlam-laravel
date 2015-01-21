<!DOCTYPE html>
<html lang="en">
  <head>
@include('includes.head')
<link href="{{{ asset('css/login.css') }}}" rel="stylesheet">
@section('title')
<title>Silahkan Login!!!</title>
@stop

  </head>

  <body>

    <div class="container">
{{ Form::open(array('url' => '/admin/login', 'class'=>'form-signin')) }}
        <h2 class="form-signin-heading">TI UNLAM</h2>
        <label for="inputUsername" class="sr-only">Username</label>
        {{ Form::text('username', null, array('class'=>'form-control', 'placeholder' => 'Username', 'required', 'autofocus')) }}
        <label for="inputPassword" class="sr-only">Password</label>
        {{ Form::password('password', array('class'=>'form-control', 'placeholder' => 'Password', 'required')) }}
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <p>{{ Form::submit('Sign in', array('class'=>'btn btn-lg btn-primary btn-block')) }}</p>
        <p>
        {{ $errors->first('username') }}
        {{ $errors->first('password') }}
        </p>
        {{ Form::close() }}
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{{ asset('assets/js/ie10-viewport-bug-workaround.js') }}}"></script>
  </body>
</html>
