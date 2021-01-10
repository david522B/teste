@extends('web.dashboard')

@section('title')
    Produtos
@endsection

@section('content')
    <hr>
    @foreach ($products as $product)
    b
        <img src="{{$product->image}}">
        <br>
    @endforeach
@endsection