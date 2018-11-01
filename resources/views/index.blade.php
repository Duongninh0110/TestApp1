
@extends ('layouts.frontendLayout')

@section ('content')

<div class="container">
  <!-- main content area -->
  <a href=""><span><i class="fa fa-home" aria-hidden="true"></i></span>Kho sách</a>
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
  <div class="row mt-3">    
    @foreach ($products as $product)
        <div class="col-md-4 col-lg-4 text-center">
            <a href="{{url('/product/'.$product->id)}}"><img style="width: 285px; height: 405px;" src="{{asset('images/backend_images/products/'.$product->photo)}}" alt=""></a>
            <h2>VND {{number_format($product->price)}}</h2>
            <p>{{$product->name}}</p>

        </div>
    @endforeach
  </div>
</div>



@endsection