@extends('bank.layouts.app-login')

@section('content')
<section class="login p-fixed d-flex text-center bg-primary common-img-bg">
	<!-- Container-fluid starts -->
	<div class="container-fluid">
		<div class="row">

			<div class="col-sm-12">
				<div class="login-card card-block">
					<form class="md-float-material" method="POST" action="{{ route('bank.login.post') }}">
            @csrf

						<div class="text-center">
							<img src="{{asset('vendor/ablepro-lite/assets/images/logo-blue.png')}}" alt="logo">
						</div>
						<h3 class="text-center txt-primary">
							Sign In to your account
						</h3>
						<div class="md-input-wrapper-custom">
              <input id="email" type="email" placeholder="Email" class="md-form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
						</div>
            @if ($errors->has('email'))
                <span class="invalid-feedback badge-inverse-danger" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
						<div class="md-input-wrapper-custom">
              <input id="password" type="password" placeholder="Password" class="md-form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
						</div>
            @if ($errors->has('password'))
                <span class="invalid-feedback  badge-inverse-danger" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
						<div class="row">
							<div class="col-sm-6 col-xs-12">
  							<div class="rkmd-checkbox checkbox-rotate checkbox-ripple m-b-25">
  								<label class="input-checkbox checkbox-primary">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
  									<span class="checkbox"></span>
  								</label>
  								<div class="captions">Remember Me</div>

  							</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-10 offset-xs-1">
								<button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">LOGIN</button>
							</div>
						</div>
						<!-- <div class="card-footer"> -->
						<div class="col-sm-12 col-xs-12 text-center">
							<span class="text-muted">Don't have an account?</span>
							<a href="{{url('bank/register')}}" class="f-w-600 p-l-5">Sign up Now</a>
						</div>

						<!-- </div> -->
					</form>
					<!-- end of form -->
				</div>
				<!-- end of login-card -->
			</div>
			<!-- end of col-sm-12 -->
		</div>
		<!-- end of row -->
	</div>
	<!-- end of container-fluid -->
</section>
@endsection
