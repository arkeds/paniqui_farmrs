@extends('layout')
@section('content')


<div class="card">
	<div class="card-header bg-warning text-white">
  		Edit Machine
  	</div>
  <div class="card-body">
  	<form action="{{url("/farmers/".$owner->id."/machines/".$machine_id)}}" method="POST">
    <h4 class="card-title">Machine Information</h4>
    
  	
    <div class="row">
    	
    	<div class="col-md-4">
    		<label>Machine Type</label>
    		<select class="form-control" id="machines" name="mach_name" onchange="setUnitCapacity()" >
                @foreach($machines as $list)
             
                <option {{$list->id == $machine->machine->id ? "SELECTED" : "" }} data-capacity="{{$list->machUnit}}"  value="{{$list->id}}">{{ $list->codedName() }}</option>
                @endforeach
            </select>
    	</div>
    </div>

    <div class="row">
    	<div class="col-md-4">
    		<div class="form-group">
    			<label>Serial No.</label>
    			<input type="text" class="form-control" name="mach_serial" value="{{$machine->serial}}">
    			
    		</div>
    	</div>
    	<div class="col-md-4">
    		<label>Brand</label>
    		<input type="text" class="form-control" name="mach_brand" value="{{$machine->brand}}">
    	</div>
    	<div class="col-md-4">
    		<label>Capacity</label>
    		<div class="input-group mb-3">
		      <input type="text" class="form-control" name="mach_capacity" value="{{$machine->capacity}}">
		      <div class="input-group-append">
		        <span class="input-group-text" id="unit_capacity"></span>
		        <input type="hidden"  value="" id="unit_text">
		      </div>
		    </div>
    	</div>
    </div>

    <div class="row">
    	<div class="col-md-4">
    		<div class="form-group">
    			<label>Mode of Acquisition</label>
    			<select class="form-control" name="mach_acqmode">
                    <option value="CSH" {{ $machine->acquire_mode == "CSH" ? "SELECTED" : "" }}>Cash</option>
                    <option value="GRT" {{ $machine->acquire_mode == "GRT" ? "SELECTED" : "" }}>Grant</option>
                    <option value="LON" {{ $machine->acquire_mode == "LON" ? "SELECTED" : "" }}>Loan</option>
                    <option value="COS" {{ $machine->acquire_mode == "COS" ? "SELECTED" : "" }}>Cost-Sharing</option>
                </select>
    		</div>
    	</div>
    	<div class="col-md-4">
    		<div class="form-group">
    			<label>Year Acquired</label>
    			<input type="text" class="form-control" name="mach_year" value="{{$machine->acquisition_year}}">
    		</div>
    	</div>
    </div>

    <div class="row">
    	<div class="col-md-4">
    		<div class="form-group">
    			<label>Supplier</label>
    			<input type="text" class="form-control" name="mach_supplier" value="{{$machine->supplier}}">
    		</div>
    	</div>
    	<div class="col-md-8">
    		<div class="form-group">
    			<label>Supplier Address</label>
    			<input type="text" class="form-control" name="supplier_address" value="{{$machine->supplier_address}}">
    		</div>
    	</div>
    </div>

    <input type="hidden" name="has_engine" value="{{$machine->engine ? "1" : "0"}}">
    <br>
    @if ($machine->engine)
    <h4>Engine Information</h4>
    <input type="hidden" name="engine_id" value="{{$machine->engine ? $machine->engine->id : ""}}">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Serial No.</label>
                <input type="text" name="eng_serial" class="form-control" value="{{$machine->engine ? $machine->engine->serial : "" }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Brand</label>
                <input type="text" name="eng_brand" class="form-control" value="{{$machine->engine ? $machine->engine->brand : ""}}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Year Acquired</label>
                <input type="text" name="eng_year" class="form-control" value="{{$machine->engine ? $machine->engine->acquisition_year : ""}}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Mode of Acquisition</label>
                <select class="form-control" name="eng_acqmode">
                    <option value="CSH" {{ $machine->engine && $machine->engine->acquire_mode == "CSH" ? "SELECTED" : "" }}>Cash</option>
                    <option value="GRT" {{ $machine->engine && $machine->engine->acquire_mode == "GRT" ? "SELECTED" : "" }}>Grant</option>
                    <option value="LON" {{ $machine->engine && $machine->engine->acquire_mode == "LON" ? "SELECTED" : "" }}>Loan</option>
                    <option value="COS" {{ $machine->engine && $machine->engine->acquire_mode == "CSH" ? "SELECTED" : "" }}>Cost-Sharing</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Rated Power</label>
                <div class="input-group mb-3">
                  <input type="text" name="eng_rpower" class="form-control" value="{{$machine->engine ? substr_replace($machine->engine->rated_power ,"",-2) : ""}}">
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
    
    @endif

    <br>
    @csrf
    @method('PATCH')
    <button class="btn btn-primary" type="submit">Update</button>
    <a class="btn btn-secondary" href="{{url("/farmers/".$owner->id."/machines")}}">Cancel</a>
    </form>
  </div>
  
</div>

<br>

@endsection

@push('scripts')
<script type="text/javascript">
    window.addEventListener("load",function(){
        let machine_select = document.querySelector('#machines');
        let capacity = machine_select[machine_select.selectedIndex].getAttribute('data-capacity'); 
        document.querySelector('#unit_capacity').innerHTML = capacity;
        document.querySelector('#unit_text').text = capacity;
    },false);
</script>
@endpush