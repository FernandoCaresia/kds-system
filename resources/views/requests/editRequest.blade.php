@extends('layouts.app')

@section('content')

<div class="container">

<form method="POST">    

    @csrf

    <div class="mb-3">
        <label class="form-label">Menu</label>
        <input type="text" name="menu" value="{{$data->menu}}" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="number" name="price" value="{{$data->price}}" class="form-control">
    </div>

    <input type="submit" class="btn btn-primary" value="Edit Request" />

</form>

</div>




@endsection


