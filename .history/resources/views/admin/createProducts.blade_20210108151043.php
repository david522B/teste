@extends('admin.dashboard')

@section('title')
    Produtos
@endsection

@section('content')
    <form action="/products" method="POST">
        @csrf
        
        <se
        <input type="text" name="name" placeholder="Titulo">
        <input type="text" name="description" placeholder="Descrição">
    </form>
@endsection

