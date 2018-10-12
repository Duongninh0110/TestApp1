@extends ('layout.front_layout.front_design')
@section ('content')

<section id="form" style="margin-top:20px "><!--form-->
		<div class="container">
			<div class="row">

				@if (session('flash_message_error'))

			        <div class="alert alert-danger alert-block">
			            <button type="button" class="close" data-dismiss="alert">×</button> 
			            <strong>{!!session('flash_message_error')!!}</strong>
			        </div>					           
		        @endif  


			    @if (session('flash_message_success'))

			      <div class="alert alert-success alert-block">
			          <button type="button" class="close" data-dismiss="alert">×</button> 
			          <strong>{!!session('flash_message_success')!!}</strong>
			      </div>
			    @endif 

			    @if ($errors->any())
			        <div class="alert alert-danger">
			            <ul>
			                @foreach ($errors->all() as $error)
			                    <li>{{ $error }}</li>
			                @endforeach
			            </ul>
			        </div>
			    @endif

				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form id="loginForm" name="loginForm" action="{{url('/user-login')}}" method="post">
							@csrf
							
							<input name="email" id="email" type="email" placeholder="Email Address" />
							<input name="password" id="password" type="password" placeholder="Password" />
							
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>

						<form id="" name="registerForm" action="/user-register" method="post">
							@csrf
							<input id="name" name="name" type="text" placeholder="Name"/>
							<input id="email" name="email" type="email" placeholder="Email Address"/>
							<input id="password" name="password" type="password" placeholder="Password"/>
							<input id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirm Password"/>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->

@endsection