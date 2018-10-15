
@extends ('layouts.frontendLayout')

@section ('content')

<div class="container">
  <!-- main content area -->
  <a href=""><span><i class="fa fa-book" aria-hidden="true"></i></span>{{$productDetails->name}}</a>
  <div class="row mt-3 justify-content-center">
    <div class="col-md-4">
      <img src="{{asset('images/backend_images/products/'.$productDetails->photo)}}" alt="">
      
    </div>

    <div class="col-md-4 ">
      <h2>{{$productDetails->name}}</h2>                
      <span>
        <span>VND {{number_format($productDetails->price)}}</span>            
        
      </span>
      <h3>Giới thiệu:</h3>
      <p>{{$productDetails->description}}</p>
      
    </div>

  </div>
</div>



@endsection