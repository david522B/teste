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
    <form action="/admin/categories" id="createCategoryForm" method="POST">
      @csrf
      <input type="text" name="name" placeholder="Nome da Categori">
      <input type="submit" value="Salvar">
    </form>
@endsection
