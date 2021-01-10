@extends('admin.dashboard')

@section('title')
    Categorias
@endsection

@section('content')
  <a type="button" href="/admin/categories/create">Criar Categoria</a>
    <hr>
    @foreach ($categories as $category)
        <!-- nome e preço do produto-->
        <span>{{$category->category}}</span> 
        
        <!-- icones de ação-->
        <a href="/admin/categories/{{$category->id}}/edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-trash" data-toggle="modal" data-target="#confirmExclude" aria-hidden="true"></i></a>

        <form action="/admin/cate/{{$product->id}}" id="excludeForm" method="POST">
          @method('DELETE')
          @csrf
        </form>
        
        <br>
        <hr>
    @endforeach
  
    <!-- Modal -->
    <div class="modal fade" id="confirmExclude" tabindex="-1" role="dialog" aria-labelledby="confirmExclude" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja excluir?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Essa ação não poderá ser desfeita, deseja prosseguir?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" id="excludeConfirmed" class="btn btn-danger">Apagar</button>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('js')    
  <!-- Font Awesome-->
  <script src="https://kit.fontawesome.com/19fb236c69.js" crossorigin="anonymous"></script>

  <script type="text/javascript">
    $(document).on('click', '#excludeConfirmed', function() {
      $('#excludeForm').submit()
    })
  </script>
@endsection
