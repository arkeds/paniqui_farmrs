@extends('layout')
@section('content')


<div class="card">
	<div class="card-header bg-primary text-white">
  		Register Machine
  	</div>
  <div class="card-body">
  	<form action="{{url("/farmers/".$owner->id."/machines")}}" method="POST">
    <h4 class="card-title">Machine Information</h4>
    
  	
    <div class="row">
    	<div class="col-md-4">
    		<div class="form-group">
    			<label>Machine Class</label>
    			<select class="form-control" onchange="getMachines(this.value)" name="mach_purp">
    				<option value="0">--Machine Type--</option>
    				@foreach($machine_purposes as $purpose)
    				<option value="{{$purpose->id}}">{{ $purpose->description }}</option>
    				@endforeach
    			</select>
    			
    		</div>
    	</div>
    	<div class="col-md-4">
    		<label>Machine Type</label>
    		<select class="form-control" id="machines" name="mach_name" onchange="setUnitCapacity()"></select>
    	</div>
    </div>

    <div class="row">
    	<div class="col-md-4">
    		<div class="form-group">
    			<label>Serial No.</label>
    			<input type="text" class="form-control" name="mach_serial">
    			
    		</div>
    	</div>
    	<div class="col-md-4">
    		<label>Brand</label>
    		<input type="text" class="form-control" name="mach_brand" >
    	</div>
    	<div class="col-md-4">
    		<label>Capacity</label>
    		<div class="input-group mb-3">
		      <input type="text" class="form-control" name="mach_capacity" aria-label="Amount (to the nearest dollar)">
		      <div class="input-group-append">
		        <span class="input-group-text" id="unit_capacity"></span>
		        <input type="hidden" name="unit_text" value="" id="unit_text">
		      </div>
		    </div>
    	</div>
    </div>

    <div class="row">
    	<div class="col-md-4">
    		<div class="form-group">
    			<label>Mode of Acquisition</label>
    			<select class="form-control" name="mach_acqmode">
                    <option value="CSH">Cash</option>
                    <option value="GRT">Grant</option>
                    <option value="LON">Loan</option>
                    <option value="COS">Cost-Sharing</option>
                </select>
    		</div>
    	</div>
    	<div class="col-md-4">
    		<div class="form-group">
    			<label>Year Acquired</label>
    			<input type="text" class="form-control" name="mach_year">
    		</div>
    	</div>
    </div>

    <div class="row">
    	<div class="col-md-4">
    		<div class="form-group">
    			<label>Supplier</label>
    			<input type="text" class="form-control" name="mach_supplier">
    		</div>
    	</div>
    	<div class="col-md-8">
    		<div class="form-group">
    			<label>Supplier Address</label>
    			<input type="text" class="form-control" name="supplier_address">
    		</div>
    	</div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                
                <div class="custom-control custom-checkbox">
                      <input onclick="showEngineForm(this)" type="checkbox" class="custom-control-input col-md-8" id="engine_checkbox" name="has_engine" value="1">
                      <label class="custom-control-label" for="engine_checkbox">Click to enter Engine Details</label>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div id="engine_div">
    <h4>Engine Information</h4>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Serial No.</label>
                <input type="text" name="eng_serial" class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Brand</label>
                <input type="text" name="eng_brand" class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Year Acquired</label>
                <input type="text" name="eng_year" class="form-control">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Mode of Acquisition</label>
                <select class="form-control" name="eng_acqmode">
                    <option value="CSH">Cash</option>
                    <option value="GRT">Grant</option>
                    <option value="LON">Loan</option>
                    <option value="COS">Cost-Sharing</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Rated Power</label>
                <div class="input-group mb-3">
                  <input type="text" name="eng_rpower" class="form-control">
                  <div class="input-group-append">
                    <span class="input-group-btn" >
                        <select class="form-control" name="eng_runit">
                          <option value="hp">HorsePower - hp</option>
                          <option value="kw">KilloWatt - kW</option>
                        </select>
                    </span>
                  </div>
                </div>
                
            </div>
        </div>
    </div>
    </div>
    @csrf
    @method('POST')
    <button class="btn btn-primary" type="submit">Save</button>
    <a class="btn btn-secondary" href="{{url("/farmers/".$owner->id."/machines")}}">Cancel</a>
    </form>
  </div>
  
</div>

<br>

@endsection