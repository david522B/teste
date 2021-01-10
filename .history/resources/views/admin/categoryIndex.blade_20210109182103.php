@extends('admin.dashboard')

@section('title')
    Categorias
@endsection

@section('content')
  <!-- Modal confirmar se deseja excluir item -->
  @include('excludeModal')

  <a type="button" href="/admin/categories/create">Criar Categoria</a>
  <hr>
  @foreach ($categories as $category)
    <!-- nome e preço do produto-->
    <span>{{$category->category}}</span> 
        
    <!-- icones de ação-->
    <a href="/admin/categories/{{$category->id}}/edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
    <a href="#"><i class="fa fa-trash" id="{{$category->id}}" data-toggle="modal" data-target="#confirmExclude" aria-hidden="true"></i></a>

    <form action="/admin/categories/{{$category->id}}" id="excludeForm{{$category->id}}" method="POST">
      @method('DELETE')
      @csrf
    </form>
        
    <br>
    <hr>
  @endforeach
@endsection

@section('js')    
  <!-- Font Awesome-->
  <script src="https://kit.fontawesome.com/19fb236c69.js" crossorigin="anonymous"></script>

  <script type="text/javascript">
    $(document).on('click', '.fa-trash', function() {
      console.log('')
    })
    $(document).on('click', '#excludeConfirmed', function() {
      $(`#excludeForm`).submit()
    })
  </script>
@endsection
