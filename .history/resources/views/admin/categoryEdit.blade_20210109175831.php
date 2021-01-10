@extends('admin.dashboard')

@section('title')
  Produtos
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
  </form>
  