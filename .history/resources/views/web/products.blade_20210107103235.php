@extends('web.dashboard')

@section('title')
    Produtos
@endsection

@section('content')
    <hr>
    @foreach ($products as $product)
        @if ($product->image != NU::)
            
        @else
            
        @endif
        <img src="{{$product->image}}">
        <br>
    @endforeach
@endsection