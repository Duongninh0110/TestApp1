@extends('layout.admin_layout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="/" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" >Products</a><a href="#" class="current">View Products</a> </div>
    <h1>Products</h1>

    @if (session('flash_message_success'))

	    <div class="alert alert-success alert-block">
	        <button type="button" class="close" data-dismiss="alert">×</button> 
	        <strong>{!!session('flash_message_success')!!}</strong>
	    </div>
    @endif 

  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
   
        <div class="widget-box">

          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>View Products</h5>
          </div>
          

          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Product_ID</th>
                  <th>Category_ID</th>                  
                  <th>Product Name</th>                                  
                  <th>Price</th>
                  <th>Images</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>

              	@foreach ($products as $product)
                <tr class="gradeX">
                  <td>{{$product->id}}</td>
                  <td>{{$product->category_id}}</td>                

                  <td>{{$product->name}}</td>
                                   
                  <td>{{$product->price}}</td>
                  
                  <td> 
                  @if(!empty($product->photo))
                    <img src="{{asset('/images/backend_images/products/'.$product->photo)}}" style="width: 60px" ></td>
                 
                  @endif
                  <td class="center">
                    
                    <a href="{{url('admin/edit-product/'.$product->id)}}" class="btn btn-primary btn-mini" title="edit">Edit</a>
                    <a rel="{{$product->id}}" rel1="delete-product"  href="javascript:" class="btn btn-danger btn-mini deleteRecord" title="delete">Delete</a></td>
                </tr>

                
                
  

                @endforeach
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  



@endsection