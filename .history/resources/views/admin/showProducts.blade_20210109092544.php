@extends('admin.dashboard')

@section('title')
    Produtos
@endsection

@section('content')
    
@endsection

@section('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#price').mask('000.000.000.000.000,00', {reverse: true})
        });

        $(document).on('submit','#createProductForm',function(){
            $('#price').unmask()
            $('#price').mask('000000.00', {reverse: true})
        });
    </script>
@endsection
