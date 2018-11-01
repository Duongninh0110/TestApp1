<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    {{-- <link rel="stylesheet" href="css/style.css"> --}}

    <title>Kho sách</title>
  </head>
  <body>

    <header>
      <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a href="" class="navbar-brand">Kho Sách</a>
      <button type="button" class="navbar-toggler button-right" data-toggle="collapse" data-target="#myNav">
        <span class="toggle-bar-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="myNav"> 
        <ul class="navbar-nav">
          <li class="nav-item"><a href="{{url('/')}}" class="nav-link">Home</a></li>
          @if(empty(Auth::check()))
          <li class="nav-item"><a href="{{url('/user-login')}}" class="nav-link">Login</a></li>
          <li class="nav-item"><a href="{{url('/user-register')}}" class="nav-link">Register</a></li>
          @else
          <li class="nav-item"><a href="{{url('user-logout')}}" class="nav-link">Logout</a></li>
          @endif
          @if(!empty(Session('admin')))
          <li class="nav-item"><a href="{{url('/admin/dashboard')}}" class="nav-link">Admin</a></li>
          @endif 
        </ul>
      </div>
    </nav>
      <div class="jumbotron">
        <div class="container">
          <h1>Kho Sách</h1>
          <p>Đây là kho sách của Ninh, phục vụ cho TestApp1</p>
          
        </div>
        
      </div>
    </header>
    <!-- All nav bar content -->      
    

    @yield('content')

    <footer>
      <!-- footer content -->

      <div class="container-fluid bg-dark text-light mt-3">
        <p class="text-center">&copy: 2018 duongninh</p>
        <div class="text-center">
          <ul class="list-inline">
            <li class="list-inline-item"><a href="https://www.youtube.com" target="_blank"><i class="fa fa-youtube-square fa-inverse" aria-hidden="true"></i></a></li>
            <li class="list-inline-item"><a href="https://www.facebook.com" target="_blank"><i class="fa fa-facebook-square fa-inverse" aria-hidden="true"></i></a></li>
            <li class="list-inline-item"><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter-square fa-inverse" aria-hidden="true"></i></a></li>
          </ul>  
        </div>
        
      </div>
    </footer>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


  </body>
</html>