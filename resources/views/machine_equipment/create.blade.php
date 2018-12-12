@extends('layout')
@section('content')

<div class="card">
  <div class="card-header bg-primary text-white">
    Edit Machine/Equipment
  </div>
  <div class="card-body">
  <form action="{{url('/machine-equipment')}}" method="POST">
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label>Machine Purpose</label>
          <select required class="form-control" name="purpose">
            @foreach($purposes as $purpose)
            <option  value="{{$purpose->id}}">{{$purpose->description}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label>Machine Type</label>
          <select required class="form-control" name="type">
            @foreach($types as $type)
            <option value="{{$type->id}}">{{$type->description}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label>Code</label>
          <input type="text" name="code" class="form-control" required >
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Name</label>
          <input type="text" name="machine" class="form-control" required >
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label>Unit</label>
          <input type="text" name="unit" class="form-control"  >
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label>Accessory</label>
          <select class="form-control" name="is_accessory">
            <option  value="0">Non-Accessory</option>
            <option  value="1">Is-Accessory</option>
          </select>
        </div>
      </div>
    </div>
    @csrf
    @method('POST')
    <button type="submit" class="btn btn-primary">Save</button>
    <a class="btn btn-secondary" href="/machine-equipment">Cancel</a>
  </form>
  </div>


</div>

@endsection