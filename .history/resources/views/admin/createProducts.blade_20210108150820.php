@extends('admin.dashboard')

@section('title')
    Produtos
@endsection

@section('content')
    <form action="/products" method="POST">
    @csrf
    <input type="text"
    </form>
@endsection

