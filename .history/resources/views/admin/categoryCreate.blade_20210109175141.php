@extends('admin.dashboard')

@section('title')
    Categorias
@endsection

@section('content')
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="/admin/products" id="createProductForm" method="POST">
        @csrf
        
        <select name="category">
            <option value="">Categoria</option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->category}}</option>
            @endforeach
        </select>
        <input type="text" name="name" placeholder="Titulo">
        <input type="text" name="description" placeholder="Descrição">
        <input type="text" name="price" id="price"  placeholder="Preço">
        <input type="submit" value="Salvar">
    </form>
@endsection
