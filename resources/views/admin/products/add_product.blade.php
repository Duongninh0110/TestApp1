
@extends ('layouts.backendLayout')

@section ('content')

<div class="container">
  <!-- main content area -->
  <a href=""><span><i class="fa fa-book" aria-hidden="true"></i></span> Thêm sách</a>
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
      <h2>Thêm Sách</h2>
      <form method="post" action="{{url('/admin/add-product')}}" name="add_product" id="add_product" novalidate="novalidate" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label class="">Tên Sách</label>
          <input type="text" name="product_name" class="form-control " id="product_name" value="{{ old('product_name') }}" />         
        </div>

        <div class="form-group">
          <label class="">Giá</label>          
          <input type="number" name="price" id="price" class="form-control " />
        </div>

        <div class="form-group">
          <label class="">Ảnh Minh Họa</label>
          <input type="file" name="image" id="image" class="" />
        </div>

        

        <div class="form-group">
          <label class="">Giới Thiệu</label>
          <textarea type="text" name="description" id="description" class="form-control " rows="10"></textarea>
        </div>

        <div class="form-actions">
          <input type="submit" value="Add product" class="btn btn-success btn-block">
        </div>
      </form>
      
    </div>
  </div>
</div>



@endsection