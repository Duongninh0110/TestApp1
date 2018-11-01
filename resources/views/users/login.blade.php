
@extends ('layouts.frontendLayout')

@section ('content')

<div class="container">
  <!-- main content area -->
  <a href=""><span><i class="fa fa-users" aria-hidden="true"></i></span> Login</a>
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
      <h3>Login to your account</h3>
      <form id="loginForm" name="loginForm" action="{{url('/user-login')}}" method="post">
        @csrf
        <div class="form-group">
          <label for="email">Email Address</label>
          <input name="email" id="email" type="email" class="form-control" placeholder="Email Address" />
        </div>
        
        <div class="form-group">
          <label for="password">Password</label>
          <input name="password" id="password" type="password" class="form-control" placeholder="Password" />
        </div>
        
        
        <button type="submit" class="btn btn-success btn-block">Login</button>
      </form>
      
    </div>
  </div>
</div>



@endsection