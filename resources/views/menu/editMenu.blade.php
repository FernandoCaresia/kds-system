@extends('layouts.app')

@section('content')

<div class="container">

<form method="POST" action="#">    

    @csrf
    
    <div class="mb-3">
        <label class="form-label">Menu</label>
        <input type="text" name="menu" value="{{$data->menu}}" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea class="form-control" name="description" rows="3">{{$data->description}}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="number" name="price" value="{{$data->price}}" class="form-control">
    </div>

    <input type="submit" class="btn btn-warning" value="Edit Item" />

</form>

</div>

@endsection


