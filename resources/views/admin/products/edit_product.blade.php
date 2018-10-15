
@extends ('layouts.backendLayout')

@section ('content')

<div class="container">
  <!-- main content area -->
  <a href=""><span><i class="fa fa-pencil" aria-hidden="true"></i></span> Sửa Thông Tin Sách</a>
  <div class="row mt-3 justify-content-center">

    <div class="col-md-6 jumbotron">
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
      <h2>Sửa Thông Tin Sách</h2>
      <form class="form-horizontal" method="post" action="{{url('/admin/edit-product/'.$productDetails->id)}}" name="edit_product" id="edit_product" novalidate="novalidate" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label class="control-label">Tên Sách</label>
          <div class="controls">
            <input type="text" name="product_name" id="product_name" value="{{$productDetails->name}}" class="form-control mb-3"/>
          </div>
        </div>
       
        <div class="form-group">
          <label class="control-label">Giá</label>
          <div class="controls">
            <input type="number" name="price" id="price" value="{{$productDetails->price}}" class="form-control mb-3"/>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label">Product Image</label>
          <div class="form-group">
            <input type="file" name="image" id="image"  />
            <input type="hidden" name="current_image" id="current_image" value="{{$productDetails->photo}}">
            @if(!empty($productDetails->photo))
            <img src="{{asset('images/backend_images/products/'.$productDetails->photo)}}" style="width: 30px">
            {{-- <a href="{{asset('/admin/delete-product-image/'.$productDetails->id)}}">Delete Image</a> --}}
            @endif
          </div>
        </div>

        

        <div class="form-group">
          <label class="control-label">Product Description</label>
          <div class="controls">
            <textarea type="text" name="description" id="description" class="form-control mb-3" rows="10">{{$productDetails->description}}</textarea> 
          </div>
        </div>
        <div class="form-actions">
          <input type="submit" value="Edit Product" class="btn btn-success">
        </div>
      </form>
      
    </div>
  </div>
</div>



@endsection