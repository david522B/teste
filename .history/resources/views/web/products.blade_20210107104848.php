@extends('web.dashboard')

@section('title')
    Produtos
@endsection

@section('content')
    <hr>
    @foreach ($products as $product)
        @if ($product->image != NULL)
            <img src="{{$product->image}}">
        @else
            <span>Sem imagem</span>
        @endif
        <hr>
    @endforeach
@endsection