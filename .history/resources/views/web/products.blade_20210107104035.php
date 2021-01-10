@extends('web.dashboard')

@section('title')
    Produtos
@endsection

@section('content')
    <hr>
    @foreach ($products as $product)
        @if ($product->image != NULL)
            <img src="{{$product->image}}">
            <span>{{$product->id}}</span>
            <br>
        @else
            <span
        @endif
    @endforeach
@endsection