
@extends ('layouts.backendLayout')

@section ('content')

<div class="container">
  <!-- main content area -->
  <a href=""><span><i class="fa fa-university" aria-hidden="true"></i></span> Kho sách</a>
  <div class="row mt-3 justify-content-center">

    <div class="col jumbotron">
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
      <h2>Kho sách</h2>
      <table class="table" style="word-break: break-all;">
        <thead>
          <tr>
            <th>Product_ID</th>
            <th style="width: 200px">Product Name</th>
            <th>Price</th>
            <th style="width: 400px">Description</th>
            <th>Images</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $product)
            <tr class="gradeX">
              <td>{{$product->id}}</td>
              <td>{{$product->name}}</td>
              <td>{{$product->price}}</td>
              <td>{{$product->description}}</td>
              <td> 
              @if(!empty($product->photo))
              <a href="{{url('/product/'.$product->id)}}"><img src="{{asset('/images/backend_images/products/'.$product->photo)}}" style="width: 60px" ></td></a>
              @endif
              <td class="center">
                
                <a href="{{url('admin/edit-product/'.$product->id)}}" class="btn btn-primary btn-mini" title="edit">Edit</a>
                <a href="{{url('admin/delete-product/'.$product->id)}}" class="btn btn-danger btn-mini" title="delete">Delete</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      
    </div>
  </div>
</div>



@endsection