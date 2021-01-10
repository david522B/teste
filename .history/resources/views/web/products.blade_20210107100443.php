@extends('web.dashboard')

@section('title')
    Produtos
@endsection

@section('content')
    <hr>
    @foreach ($products as $product)
        <img src="{{$product->ima}}">
        <br>
    @endforeach
@endsection