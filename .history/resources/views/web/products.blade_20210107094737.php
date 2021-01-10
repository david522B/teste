@extends('web.dashboard')

@section('title')
    Produtos
@endsection

@section('content')
    <hr>
    @foreach ($products as $product)
        <img src="{{\App\Models\ProductImages::getFirstItemPath($product->id)}}">
        <br>
    @endforeach
@endsection