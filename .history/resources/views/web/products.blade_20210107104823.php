@extends('web.dashboard')

@section('title')
    Produtos
@endsection

@section('content')
    <hr>
    @foreach ($products as $product)
        @if ($product->image != NULL)
            <img src="{{$product->image}}">
            <span>{{$product->name}}   |   {{$product->name}}</span>
            <br>
            
            <span>{{$product->name}}   |   {{$product->name}}</span>
        @else
            <span>Sem imagem</span>
        @endif
        <hr>
    @endforeach
@endsection