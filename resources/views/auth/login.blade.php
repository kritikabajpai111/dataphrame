@extends('layouts.commonlogin')

@section('content')

<div class="login-box">
  <div class="login-logo">
     <img src="{!! asset('img/Data_phrame_logo.png') !!}" width="380px"  alt="Company Logo">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

 <form method="POST" action="{{ route('login') }}">
	@csrf
      <div class="form-group has-feedback">
        <input type="email" name="email"  class="form-control" placeholder="{{ __('E-Mail Address') }}">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
		@error('email')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="{{ __('Password') }}"  name="password" >
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
		@error('password')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
 </form>

    <!--<div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>-->
    <!-- /.social-auth-links -->
	@if (Route::has('password.request'))
    <a href="#">{{ __('I forgot my password') }}</a><br>
    @endif
    <a href="{{ route('register') }}" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>



@endsection
