@extends('layouts.app')

@section('content')

<div class="container">
    <table class="table table-hover text-center">
        <thead>
        <tr>
            <th scope="col"># Pedido</th>
            <th scope="col"># Mesa</th>
            <th scope="col">Pedido</th>
            <th scope="col">Preço</th>
            <th scope="col">Ação</th>
            <th scope="col">Ação</th>
        </tr>
        </thead>
        <tbody>
        @if(session('errorMessage'))
            <p class="text-danger">{{session('errorMessage')}}</p>
        @endif
        @foreach($data as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->tableid}}</td>
                <td>{{$item->menu}}</td>
                <td>{{$item->price}}</td>
                <td><a href="{{route('delR', ['id' => $item->id])}}" class="btn btn-danger" onclick="return confirm('Finalizar pedido?')">Finish</a></td>
                <td><a href="{{route('editR', ['id' => $item->id])}}" class="btn btn-warning">Edit Request</a></td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>
@endsection