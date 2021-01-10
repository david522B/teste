@extends('admin.dashboard')

@section('title')
    Produtos
@endsection

@section('content')
<a href="/admin/products/{{$product->id}}">
    @if ($product->image != NULL)
        <img src="{{$product->image}}">
    @else
        <span>Sem imagem  |  </span>
    @endif
    </a>
    <span><a href="/admin/products/{{$product->id}}">{{$product->name}}</a>   |   {{$product->price}}</span> 
    <a href=""><i class="fa fa-pencil" aria-hidden="true"></i></a>
    <br>
    <hr>
@endsection

