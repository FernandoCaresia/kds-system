@extends('layouts.app')

@section('content')

<div class="container">

<form method="POST" enctype="multipart/form-data">    

    @csrf
    @if(session('errorMessage'))
        <p class="text-danger">{{session('errorMessage')}}</p>
    @endif
    <div class="mb-3">
        <label class="form-label">Menu</label>
        <input type="text" name="menu" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea class="form-control" name="description" rows="3"></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="number" name="price" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Image</label>
        <input type="file" name="image" class="form-control">
    </div>

    <input type="submit" class="btn btn-primary" value="Register item" />

</form>

</div>




@endsection


