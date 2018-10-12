<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Matrix Admin</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="{{asset('css/backend_css/bootstrap.min.css')}}" />
		<link rel="stylesheet" href="{{asset('css/backend_css/bootstrap-responsive.min.css')}}" />
        <link rel="stylesheet" href="{{asset('css/backend_css/matrix-login.css')}}" />
        <link href="{{asset('css/backend_css/font-awesome.css" rel="stylesheet')}}" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <div id="loginbox">

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
                         
            <form id="loginform" class="form-vertical" method="post" action="{{url('admin')}}">
                @csrf
				 <div class="control-group normal_text"> <h3><img src="{{('images/backend_images/logo.png')}}" alt="Logo" /></h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="email" placeholder="Email" name="email" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="Password" name="password" />
                        </div>
                    </div>
                </div>

                 <div class="control-group">
                    <div class="controls">
                        <input type="submit" class="btn btn-success btn-block" name="submit" value="Login" > 
                    </div>
                </div>

                
            </form>
            
        </div>
        
        <script src="{{asset('js/backend_js/jquery.min.js')}}"></script>  
        <script src="{{asset('js/backend_js/matrix.login.js')}}"></script> 
    </body>

</html>
