@extends ('backend.layout.template')


@section ('body')
 
 <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Create New Category</h4>
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
	  					<div><h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Create New Category</h6>
	  					</div>

	  					
	  				</div>
	  				<div class="pd-1-25 pd-r-15 pd-b-25">
	  					<form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
	  						<!---------this is security token-------->
	  						@csrf

	  						<div class="form-group">
	  							<label>Category Name</label>
	  							<input type="text" name="name" class="form-control">
	  							
	  						</div>

	  						<div class="form-group">
	  							<label>Category Description</label>
	  							<textarea class="form-control" name="description" rows="3"></textarea>
	  							
	  						</div>
	  						<div class="form-group">
	  							<label>Is Parent</label>
	  							<select class="form-control" name="is_parent">
	  								<option value="0">Please Select The Parent Category If any</option>
	  								@foreach(App\Models\Backend\Category::orderBy('name', 'asc')->where('is_parent', 0)->get() as $parentcat)
	  								<option value="{{ $parentcat->id}}">{{ $parentcat->name }}</option>
	  								@foreach(App\Models\Backend\Category::orderBy('name', 'asc')->where('is_parent', $parentcat->id)->get() as $childcat)
	  								<option value="{{ $childcat->id}}">- {{ $childcat->name }}</option>
                                        

	  								@endforeach
                                        

	  								@endforeach
	  								
	  							</select>
	  							
	  						</div>
	  						<div class="form-group">
	  							<label>Status</label>
	  							<select class="form-control" name="status">
	  								<option value="0">Please Select The  Satus</option>
	  								<option value="1">Active</option>
	  								<option value="0">Inactive</option>
	  								
	  							</select>
	  							
	  						</div>

	  						<div class="form-group">
	  							<label>Category Image / Logo</label>
	  							<input type="file" class="form-controle-file" name="image">
	  							
	  						</div>

	  						<div class="form-group">
	  							<input type="submit" name="addCategory" class="btn btn-primary" value="Add New Category">
	  							
	  						</div>
	  						
	  						
	  					</form>
	  					
	  				</div>

	  				
	  			</div>
	  			<!---------body content end------------->
	  			
	  		</div>
	  		
	  	</div>
	  	
	  </div>

@endsection

