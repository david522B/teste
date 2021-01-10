@extends('admin.dashboard')

@section('title')
    Produtos
@endsection

@section('content')
    <hr>
    @foreach ($products as $product)
        @if ($product->image != NULL)
            <img src="{{$product->image}}">
        @else
            <span>Sem imagem  |  </span>
        @endif
        <span>{{$product->name}}   |   {{$product->price}}</span>
            <br>
            <span>{{$product->description}}</span>
            <a href="#"></a><i class="fa fa-pencil" aria-hidden="true"></i>
        <hr>
    @endforeach
@endsection