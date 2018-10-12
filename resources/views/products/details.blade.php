@extends ('layout.front_layout.front_design')
@section ('content')

<section>
		<div class="container">
			<div class="row">

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

				<div class="col-sm-3">
					@include ('layout.front_layout.front_sidebar')
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">

								<img src="{{asset('images/backend_images/products/'.$productDetails->photo)}}" alt="">
							</div>
							

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								
								<h2>{{$productDetails->name}}</h2>								
								<span>
									<span>VND {{number_format($productDetails->price)}}</span>						
									
								</span>
								
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#description" data-toggle="tab">Giới Thiệu</a></li>
								
								
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="description" >
								<div class="col-sm-12">

									<p>{{$productDetails->description}}</p>

								</div>
							</div>
						</div>
					</div><!--/category-tab-->
					
					
					
				</div>
			</div>
		</div>
	</section>

@endsection