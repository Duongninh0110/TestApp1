
@extends ('layout.front_layout.front_design')

@section ('content')


		
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				@include ('layout.front_layout.front_sidebar')
			</div>
			
			<div class="col-sm-9 padding-right">

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
</section>


@endsection