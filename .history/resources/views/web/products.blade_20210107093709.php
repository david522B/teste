@extends('web.dashboard')

@section('title')
    Produtos
@endsection

@section('content')
    <hr>
    @foreach ($products as $product)
        <img src="{{\App\Models\ProductImages::where('product')}}"
    @endforeach
@endsection