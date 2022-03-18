@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('errorMessage'))
                <p class="text-danger">{{session('errorMessage')}}</p>
            @elseif(session('successRequest'))
                <p class="text-success">{{session('successRequest')}}</p>
            @endif
            <div class="card">
                <div class="card-header">Menu</div>

                <div class="row">
                    
                    

                            @foreach($data as $item)
                                <form method="POST">
                                @csrf
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="{{URL::asset('storage/images/'.$item->img)}}" class="card-img-top" alt="..." />
                                                <h5 class="card-title mt-3" name="menu">{{$item->menu}}</h5>
                                                <p class="card-text">{{$item->description}}</p>
                                                <p>R${{$item->price}}</p>
                                                <input type="submit" value="Pedir Já!" onclick="return confirm('Deseja pedir este item?')" class="btn btn-primary">

                                                <input type="hidden" display="none" value="{{$item->menu}}" name="menu" />
                                                <input type="hidden" display="none" value="{{$item->description}}" name="description" />
                                                <input type="hidden" display="none" value="{{$item->price}}" name="price" />
                                                <input type="hidden" display="none" value="{{Auth::id()}}" name="tableid" />

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endforeach
                    <!--<img src="{{URL::asset('/images/pizza2.jpg')}}" class="card-img-top" alt="...">-->
                    
                </div>

            </div>
        </div>
    </div>
</div>
@endsection


