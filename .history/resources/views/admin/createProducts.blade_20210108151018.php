@extends('admin.dashboard')

@section('title')
    Produtos
@endsection

@section('content')
    <form action="/products" method="POST">
        @csrf
        
        <input type="text" name="name" placeholder="Titulo">
        <input type="text" name="description" placeholder="Titulo">
    </form>
@endsection

