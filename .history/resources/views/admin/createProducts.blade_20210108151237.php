@extends('admin.dashboard')

@section('title')
    Produtos
@endsection

@section('content')
    <form action="/products" method="POST">
        @csrf
        
        <select>
            @foreach ($categories as $category)
                <option value="">Categ</option>
                <option value="{{$category}}">{{$category}}</option>
            @endforeach
        </select>
        <input type="text" name="name" placeholder="Titulo">
        <input type="text" name="description" placeholder="Descrição">
    </form>
@endsection

