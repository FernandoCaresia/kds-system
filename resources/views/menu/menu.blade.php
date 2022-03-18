@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Menu</div>
                
                @if(session('errorMessage'))
                    <p class="text-danger">{{session('errorMessage')}}</p>
                @endif

                <div class="row">

                    @foreach($menu as $item)
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <img src="{{URL::asset('storage/images/'.$item->img)}}" class="card-img-top" alt="..." />
                                    <h5 class="card-title mt-3">{{$item->menu}}</h5>
                                    <p class="card-text">{{$item->description}}</p>
                                    <p>R${{$item->price}}</p>
                                    <a href="{{route('deleteMenu', ['id' => $item->id])}}" onclick="return confirm('Apagar item do menu?')" class="btn btn-danger">Apagar</a>
                                    
                                    <a href="{{route('menuUpdate', ['id' => $item->id])}}" class="btn btn-warning">Corrigir</a>
                                </div>
                            </div>
                        </div>
                    
                    @endforeach
                    
                </div>

            </div>
        </div>
    </div>
</div>
@endsection


