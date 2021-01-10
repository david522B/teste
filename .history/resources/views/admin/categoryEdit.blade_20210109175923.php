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
  <form action="/admin/products/{{$product->id}}" id="updateProductForm" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="category" placeholder="Nome da categoria" value
  </form>
@endsection