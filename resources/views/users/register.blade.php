
@extends ('layouts.frontendLayout')

@section ('content')

<div class="container">
  <!-- main content area -->
  <a href=""><span><i class="fa fa-users" aria-hidden="true"></i></span> Register</a>
  <div class="row mt-3 justify-content-center">

    <div class="col-md-4 jumbotron">
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
      
      <h2>Register Form</h2>
      <form id="" name="registerForm" action="/user-register" method="post">
        @csrf
        <div class="form-group">
          <label for="name">User Name</label>
          <input id="name" name="name" type="text" class="form-control" placeholder="Name"/>
        </div>

        <div class="form-group">
          <label for="email">Email Address</label>
          <input id="email" name="email" type="email" class="form-control" placeholder="Email Address"/>
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input id="password" name="password" type="password" class="form-control" placeholder="Password"/>
        </div>
        
        <div class="form-group">
          <label for="password_confirmation">Confirm Password</label>
          <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password"/>
        </div>
        <button type="submit" class="btn btn-success btn-block">Signup</button>
      </form>
      
    </div>
  </div>
</div>



@endsection