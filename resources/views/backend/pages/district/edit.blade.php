@extends ('backend.layout.template')


@section ('body')
 
 <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Update District Information</h4>
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
	  					<div><h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Update District Information</h6>
	  					</div>

	  					
	  				</div>
	  				<div class="pd-1-25 pd-r-15 pd-b-25">
	  					<form action="{{ route('district.update', $district->id) }}" method="POST" enctype="multipart/form-data">
	  						<!---------this is security token-------->
	  						@csrf

	  						<div class="form-group">
	  							<label>District Name</label>
	  							<input type="text" name="name" class="form-control" value="{{ $district->name}}">
	  							
	  						</div>

	  						
	  						<div class="form-group">
	  							<label>Division Name</label>
	  							<select class="form-control" name="division_id">
	  								<option value="0">Please Select The Featured Satus</option>
	  								@foreach ( $divisions as $division )
	  								<option value="{{$division->id}}" @if($division->id == $district->division_id) selected @endif>{{$division->name}}</option>

	  								@endforeach
	  								
	  							</select>
	  							
	  						</div>
	  						


	  						<div class="form-group">
	  							<input type="submit" name="updateDistrict" class="btn btn-primary" value="Save Change">
	  							
	  						</div>
	  						
	  						
	  					</form>
	  					
	  				</div>

	  				
	  			</div>
	  			<!---------body content end------------->
	  			
	  		</div>
	  		
	  	</div>
	  	
	  </div>

@endsection

