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
        <i class="fa fa-pencil" aria-hidden="true"></i>
        <br>
        <span>{{$product->description}}</span>
        <hr>
    @endforeach
@endsection
