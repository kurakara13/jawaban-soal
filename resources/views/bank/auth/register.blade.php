@extends('bank.layouts.app-login')

@section('content')
<section class="login common-img-bg">
	<!-- Container-fluid starts -->
	<div class="container-fluid">
		<div class="row">
				<div class="col-sm-12">
					<div class="login-card card-block bg-white">
						<form class="md-float-material" method="POST" action="{{ route('bank.register.post') }}">
              @csrf

							<div class="text-center">
								<img src="{{asset('vendor/ablepro-lite/assets/images/logo-blue.png')}}" alt="logo">
							</div>
							<h3 class="text-center txt-primary">Create an account </h3>
							<div class="row">
								<div class="col-md-6">
										<div class="md-input-wrapper">
                      <input id="firstname" type="text" placeholder="First Name" class="md-form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ old('firstname') }}" required autofocus>
										</div>
								</div>
								<div class="col-md-6">
										<div class="md-input-wrapper">
                      <input id="lastname" type="text" placeholder="Last Name" class="md-form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname') }}" required autofocus>
										</div>
								</div>
							</div>
								<div class="md-input-wrapper">
                  <input id="email" type="email" placeholder="Email" class="md-form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
								</div>
                @if ($errors->has('email'))
                    <span class="invalid-feedback badge-inverse-danger" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
								<div class="md-input-wrapper">
                  <input id="password" type="password" placeholder="Password" class="md-form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
								</div>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

								<div class="md-input-wrapper">
                  <input id="password-confirm" type="password" placeholder="Confirm Password" class="md-form-control" name="password_confirmation" required>
								</div>

							<div class="rkmd-checkbox checkbox-rotate checkbox-ripple b-none m-b-20">
								<label class="input-checkbox checkbox-primary">
									<input type="checkbox" id="checkbox">
									<span class="checkbox"></span>
								</label>
								<div class="captions">Remember Me</div>
							</div>
							<div class="col-xs-10 offset-xs-1">
							<button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light m-b-20">Sign up
							</button>
							</div>
								<div class="row">
									<div class="col-xs-12 text-center">
										<span class="text-muted">Already have an account?</span>
										<a href="{{url('bank/login')}}" class="f-w-600 p-l-5"> Sign In Here</a>
									</div>
								</div>
						</form>
						<!-- end of form -->
					</div>
					<!-- end of login-card -->
				</div>
				<!-- end of col-sm-12 -->
			</div>
			<!-- end of row-->
		</div>
		<!-- end of container-fluid -->
</section>
@endsection
