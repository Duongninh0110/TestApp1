@extends('layout.admin_layout.admin_design')

@section('content')

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="/" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->

<div class="container">
    <div class="row">  
        <div class="features_items"><!--features_items-->
          <h2 class="title text-center">Kho Sách</h2>

          @foreach ($products as $product)
          <div class="col-sm-4">
            <div class="product-image-wrapper">
              <div class="single-products">
                  <div class="productinfo text-center">
                    <a href="{{url('/product/'.$product->id)}}"><img src="{{asset('images/backend_images/products/'.$product->photo)}}" alt="" /></a>
                    
                    <h2>VND {{number_format($product->price)}}</h2>
                    <p>{{$product->name}}</p>
                    
                  </div>
                  
              </div>              
            </div>
          </div>
          @endforeach 
          
        </div><!--features_items--> 
    </div>
  </div>

</div>

<!--end-main-container-part-->



@endsection 