@extends('admin.dashboard')

@section('title')
    Produtos
@endsection

@section('content')
    @if ($product->image != NULL)
        <img src="{{$product->image}}">
    @else
        <span>Sem imagem  |  </span>
    @endif
    <span>{{$product->name}}   |   {{$product->price}}</span> 
    <a href=""><i class="fa fa-pencil" aria-hidden="true"></i></a>
    <br>
    <hr>
    <span>{{$product-}}</span>
@endsection

