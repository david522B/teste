@extends('web.dashboard')

@section('title')
    Produtos
@endsection

@section('content')
    <hr>
    @foreach ($products as $product)
        <!-- Primeira imagem caso houver-->
        <a href="/web/products/{{$product->id}}">
          @if ($product->image != NULL)
            <img width="200px" height="200px" src="{{$product->image}}">
          @else
            <img width="200px" height="200px" src="/images/image-placeholder.png">
          @endif
        </a>

        <!-- nome e preço do produto-->
        <span>  |  <a href="/web/products/{{$product->id}}">{{$product->name}}</a>   |   {{$product->price}}</span> 
        
        
        
        <br>
        <hr>
    @endforeach
@endsection