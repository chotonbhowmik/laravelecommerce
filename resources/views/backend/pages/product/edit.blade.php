@extends ('backend.layout.template')


@section ('body')
 
 <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Update Product Information</h4>
          <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
      </div>

      <div class="br-pagebody">
	        <div class="row row-sm">
	          <div class="col-sm-6 col-xl-3">
	          </div>
	        </div>
	  </div>

	  <div class="br-pagebody">
	  	<div class="row row-sm">
	  		<div class="col-sm-12 col-xl-12">
	  			<!---------body content start------------->
	  			<div class="card bd-0 shadow-base">
	  				<div class="d-md-flex justify-content-between pd-25">
	  					<div><h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Update Product Information</h6>
	  					</div>

	  					
	  				</div>
	  				<div class="pd-1-25 pd-r-15 pd-b-25">
	  					<form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
	  						<!---------this is security token-------->
	  						@csrf
	  						<div class="container-fluid">
	  							<div class="row">
	  								<!---First Coloumn--->
	  								<div class="col-sm-4">
	  									<div class="form-group">
			  							<label>Product Title </label>
			  							<input type="text" name="title" class="form-control" value="{{ $product->title}}">
			  							
			  						</div>

			  						<div class="form-group">
			  							<label>Regular Price </label>
			  							<input type="text" name="regular_price" class="form-control" value="{{ $product->regular_price}}">
			  							
			  						</div>

			  						<div class="form-group">
			  							<label> Offer Price </label>
			  							<input type="text" name="offer_price" class="form-control" value="{{ $product->offer_price}}">
			  							
			  						</div>
			  						<div class="form-group">
			  							<label> Quantity </label>
			  							<input type="number" name="quantity" class="form-control" value="{{ $product->quantity}}">
			  							
			  						</div>

			  						<div class="form-group">
			  							<label> SKU Code </label>
			  							<input type="text" name="sku_code" class="form-control" value="{{ $product->sku_code}}">
			  							
			  						</div>
			  						
	  									
	  								</div>
	  								<!---Middle Coloumn--->

	  								<div class="col-sm-4">
	  									<div class="form-group">
			  							<label>Featured Product ?</label>
			  							<select class="form-control" name="featured_item">
			  								<option value="0">Please Select The Featured Satus</option>
			  								<option value="1" @if ($product->featured_item ==1 )selected @endif>Yes Featued</option>
			  								<option value="0" @if ($product->featured_item ==0 )selected @endif>Not Featured</option>
			  								
			  							</select>
			  							
			  						</div>

			  						<div class="form-group">
			  							<label>Product Brand</label>
			  							<select class="form-control" name="brand_id">
			  								<option value="0">Please Select The Product Brand</option>
			  								@foreach($brands as $brand)
			  								<option value="{{ $brand->id }}"> {{ $brand->name }}</option>
			  								@endforeach
			  								
			  								
			  								
			  							</select>
			  							
			  						</div>

			  						<div class="form-group">
			  							<label>Product Category</label>
			  							<select class="form-control" name="category_id">
			  								<option value="0">Please Select The Product Category</option>

			  								@foreach( App\Models\Backend\Category::orderBy('name', 'asc')->where('is_parent', 0)->get() as $parent_cat)

			  								<option value="{{ $parent_cat->id}}"> {{ $parent_cat->name}}</option>

			  									@foreach( App\Models\Backend\Category::orderBy('name', 'asc')->where('is_parent', $parent_cat->id)->get() as $child_cat)
			  								
			  								<option value="{{ $child_cat->id}}"> --{{ $child_cat->name}}</option>

			  								@endforeach

			  								@endforeach
			  							</select>
			  							
			  						</div>
			  						<div class="form-group">
			  							<label>Product Type </label>
			  							<select class="form-control" name="product_type">
			  								<option value="0">Please Select The  Product type</option>
			  								<option value="1" @if ($product->product_type ==1 )selected @endif>New</option>
			  								<option value="0" @if ($product->product_type ==0 )selected @endif>Pre-Owned</option>
			  								
			  							</select>
			  							
			  						</div>
			  						<div class="form-group">
			  							<label>Status</label>
			  							<select class="form-control" name="status">
			  								<option value="0">Please Select The  Satus</option>
			  								<option value="1" @if ($product->status ==1 )selected @endif>Active</option>
			  								<option value="0" @if ($product->status ==0 )selected @endif>Inactive</option>
			  								
			  							</select>
			  							
			  						</div>
	  		
	  						  			</div>

	                                     <!---Last Coloumn--->
		  							<div class="col-sm-4">

		  							<div class="form-group">
		  							<label>Product Short Description</label>
		  							<textarea class="form-control" name="short_desc" rows="5">{{ $product->short_desc}}</textarea>
		  							
		  						</div>
		  						<div class="form-group">
		  							<label>Product Description</label>
		  							<textarea class="form-control" name="desc" rows="5">{{ $product->desc}}</textarea>
		  							
		  						</div>
		  						<div class="form-group">
		  							<label> Tags</label>
		  							<input type="text" name="tags" class="form-control" value="{{ $product->tags}}">
		  							
		  						</div>	  						
	  						
                            	</div>
	  								
	  							</div>
			  							
			  						</div>
			  						<div class="container-fluid">
			  							<div class="row">
			  								<div class="col-sm-12">

			  						<div class="form-group">
			  							<label>Product Image</label>
			  							<input type="file" class="form-controle-file" name="image">
			  							
			  						</div>
	  									<div class="form-group">
	  							     <input type="submit" name="addProduct" class="btn btn-primary" value="Add New Product">
	  							
	  						      </div>
	  									
	  								</div>
	  								
	  							</div>
	  							
	  						</div>

	  						
	  						
	  					</form>
	  					
	  				</div>

	  				
	  			</div>
	  			<!---------body content end------------->
	  			
	  		</div>
	  		
	  	</div>
	  	
	  </div>

@endsection

