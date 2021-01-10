@extends('admin.dashboard')

@section('title')
    Produtos
@endsection

@section('content')
    <form action="/products" method="POST">
        @csrf
        
        Titulo:<input type="text" name="name" placeholder="Titulo">
    </form>
@endsection

