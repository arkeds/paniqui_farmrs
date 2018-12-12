@extends('layout')
@section('content')

<div class="card">
  <div class="card-header bg-warning text-white">
    Edit Machine/Equipment
  </div>
  <div class="card-body">
  <form action="{{url('/machine-equipment/'.$machine->id)}}" method="POST">
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label>Machine Purpose</label>
          <select required class="form-control" name="purpose">
            @foreach($purposes as $purpose)
            <option {{$purpose->id == $machine->machPurpose ? "SELECTED" : ""}} value="{{$purpose->id}}">{{$purpose->description}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label>Machine Type</label>
          <select required class="form-control" name="type">
            @foreach($types as $type)
            <option {{$type->id == $machine->machType ? "SELECTED" : ""}} value="{{$type->id}}">{{$type->description}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label>Code</label>
          <input type="text" name="code" class="form-control" required value="{{$machine->machCode}}">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Name</label>
          <input type="text" name="machine" class="form-control" required value="{{$machine->machName}}">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label>Unit</label>
          <input type="text" name="unit" class="form-control"  value="{{$machine->machUnit}}">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label>Accessory</label>
          <select class="form-control" name="is_accessory">
            <option {{ $machine->is_accessory == 0 ? "SELECTED" : ""}} value="0">Non-Accessory</option>
            <option {{ $machine->is_accessory == 1 ? "SELECTED" : ""}} value="1">Is-Accessory</option>
          </select>
        </div>
      </div>
    </div>
    @csrf
    @method('PATCH')
    <button type="submit" class="btn btn-primary">Save</button>
    <a class="btn btn-secondary" href="/machine-equipment">Cancel</a>
  </form>
  </div>


</div>

@endsection