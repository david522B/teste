@extends('web.dashboard')

@section('title')
    Produtos
@endsection

@section('content')
    <hr>
    @foreach ($products as $product)
        @if ($product->image != NULL)
            
        @else
            
        @endif
        <img src="{{$product->image}}">
        <br>
    @endforeach
@endsection