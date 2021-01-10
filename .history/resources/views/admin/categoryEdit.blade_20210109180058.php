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
  <form action="/admin/categories/{{$category->id}}" id="updateCategoryForm" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="category" placeholder="Nome da categoria" value="{{$category->category}}"
  </form>
@endsection