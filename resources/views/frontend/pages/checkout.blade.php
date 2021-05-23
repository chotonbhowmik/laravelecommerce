@extends('frontend.layout.account')
@section ('body')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Checkout</li>
			</ul>
		</div>
	</div>
</div>

<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row">
			<div class="shopping-cart checkout-page">
				<div class="col-md-12">
					<h2>Checkout</h2>
					
				</div>

					<div class="row">
			<div class="col-md-8">

				<form action="{{ route('order.store') }}" method="POST">
					@csrf
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>First Name</label>
								<input type="text" name="fname" class="form-control">
								
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="email" name="email" class="form-control">
								
							</div>
							<div class="form-group">
								<label>Shipping Address</label>
								<input type="text" name="address" class="form-control">
								
							</div>
							
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Last Name</label>
								<input type="text" name="lname" class="form-control">
								
							</div>
							<div class="form-group">
								<label>Phone No.</label>
								<input type="text" name="phone" class="form-control">
								
							</div>
							<div class="form-group">
								<label>Zip Code</label>
								<input type="text" name="zipcode" class="form-control">
								
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Additional Message</label>
								<textarea class="form-control" name="additional_message" rows="4"></textarea>
								
							</div>
							
						</div>
						
					</div>
					
				
			</div>

			<div class="col-md-4">
				
				<table class="table table-striped table-bordered">
					  <thead>
					    <tr>
					      <th scope="col">Image</th>
					      <th>Product Name</th>
					      <th scope="col">Price</th>
					      
					    </tr>
					  </thead>
					  <tbody>

					  	@foreach( App\Models\Frontend\Cart::totalCarts() as $item)
					    <tr>
					    	<td>
					    		@if( !is_null($item->product->image))
						    <img src="{{ asset('Backend/img/product') .'/'. $item->product->image}}" alt="" width="50">
						    @else
						    No Image Found
						    @endif
					    	</td>
					      <th>{{ $item->product->title}}</th>
					      <td>
					      	@if ( !is_null($item->product->offer_price))
							BDT {{ $item->product->offer_price *  $item->product_quantity }}
							@else
							BDT {{$item->product->regular_price *  $item->product_quantity}}

							@endif
					      </td>
					    </tr>

					    @endforeach					   
					  </tbody>
					</table>

					<table class="table table-striped">
					  
					  <tbody>
					    <tr>
					      <th>Sub Total</th>
					      <td>BDT {{ App\Models\Frontend\Cart::totalPrice()}} ৳</td>
					      
					    </tr>
					    <tr>
					      <th>Final Amount</th>
					      <td>BDT {{ App\Models\Frontend\Cart::totalPrice()}} ৳</td>
					      
					    </tr>
					    
					  </tbody>
					</table>

					<div class="payment-option">
						<h4>Please check the payment option.</h4>

						@foreach( App\Models\Backend\Payment::orderBy('priority', 'asc')->get() as $gateway)

						<div class="form-check">
						  <input class="form-check-input" type="radio" name="exampleRadios" id="{{ $gateway->slug}}" value="{{ $gateway->id}}">
						  <label class="form-check-label" for="{{ $gateway->slug}}">
						    {{ $gateway->name}}
						  </label>
						  </div>

						  @if( $gateway->slug == 'bkash')
						   <div class="gateway-option {{ $gateway->slug}} hidden">
						  	<h5>Please send money to this <strong> {{$gateway->number}}</strong> and Insert the transction number below.</h5>
						  	<div class="form-group">
						  	<input type="text" name="btransction_id" class="form-control" placeholder="Transction Id"> 
						  		
						  	</div>
						  	
						  </div>

						  @elseif( $gateway->slug == 'rocket')
						  <div class="gateway-option {{ $gateway->slug}} hidden">
						  	<h5>Please send money to this <strong> {{$gateway->number}}</strong> and Insert the transction number below.</h5>
						  	<div class="form-group">
						  	<input type="text" name="rtransction_id" class="form-control" placeholder="Transction Id"> 
						  		
						  	</div>
						  	
						  </div>
						  @elseif( $gateway->slug == 'nagad')
						  <div class="gateway-option {{ $gateway->slug}} hidden">
						  	<h5>Please send money to this <strong> {{$gateway->number}}</strong> and Insert the transction number below.</h5>
						  	<div class="form-group">
						  	<input type="text" name="ntransction_id" class="form-control" placeholder="Transction Id"> 
						  		
						  	</div>
						  	
						  </div>
						  @else( $gateway->slug == 'cashondelivery')
						  <div class="gateway-option {{ $gateway->slug}} hidden">
						  	<h5>Once you received the order, You have to pay the money to the delivery man</h5>
						  	
						  	
						  </div>
						  @endif()

						 
						
						@endforeach
						<input type="hidden" name="product_finalprice" value="{{ App\Models\Frontend\Cart::totalPrice()}}">
						<div class="form-group">
							<input type="submit" name="order" class="btn btn-primary checkout-btn" value="Place Your Order">
							
						</div>


						</form>
						
					</div>
			     </div>
			
		      </div>
				
			</div>
			
		</div>

	
		
	</div>
	
</div>

@endsection
