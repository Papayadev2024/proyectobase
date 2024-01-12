@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Productos</h1>
@stop
@section('plugins.BootstrapSlider', true)
@section('content')

    @if (session('mensaje'))

    <div class="alert alert-success">
        <strong>
            {{session('mensaje')}}
        </strong>

    </div>

    @endif


    <div class="card-header">
        <a href="{{route('admin.productos.create')}}"  class="btn btn-primary"> Nuevo producto </a> 
    </div>
    <div class="card">
      <div class="card-body">
        
      <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>CATEGORIA</th>
                <th>PRECIO</th>
                <th>STOCK</th>
                <th>DESTACADO</th>
                <th>VISIBLE</th>
                <th>tools</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td>{{$producto->id}}</td>
                    <td>{{$producto->nombre}}</td>
                    <td>{{$producto->categoria}}</td>
                    <td>{{$producto->precio}}</td>
                    <td>{{$producto->stock}}</td>
                    <td>
                        <form method="POST" action="">
                                @csrf
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input check_d" id='{{'d_'.$producto->id}}' data-idUser='{{$producto->id}}' data-nameUser='{{$producto->nombre}}' >
                                <label class="custom-control-label" for="{{'d_'.$producto->id}}"></label>
                            </div>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="">
                                @csrf
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input check_v" id='{{'v_'.$producto->id}}' data-idUser='{{$producto->id}}' data-nameUser='{{$producto->nombre}}' >
                                <label class="custom-control-label" for="{{'v_'.$producto->id}}"></label>
                            </div>
                        </form>
                    </td>
                    <td width="15px">
                        <a href="{{route('admin.productos.edit', $producto)}}" class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>
                        <form action="{{route('admin.productos.destroy', $producto)}}" method="POST">
                            @method('delete')
                            @csrf
                            <input type="submit" value="Eliminar" class="btn btn-danger btn-sm">
                        </form>
                    </td>
                </tr>         
            @endforeach
        </tbody>

    </table>

      </div>
    </div>
@stop


@section("js")

<script>

     $( document ).ready(function() {
           
        new DataTable('#example');
       
        
         $( ".check_d" ).on( "change", function() {
                
                var statusDestacado = 0;
                var idDestacado= $(this).attr('data-idUser');
                var nombreProducto= $(this).attr('data-nameUser');
               
                if( $(this).is(':checked') ){
                  statusDestacado = 1;
                }else{
                  statusDestacado = 0;
                 }

                console.log($('input[name="_token"]').val()); 
                console.log(statusDestacado);
                console.log(idDestacado);

                $.ajax({
                    url: "{{ route('producto.updateDestacado') }}",
                    method: 'POST',
                    data:{
                        _token: $('input[name="_token"]').val(),
                        status: statusDestacado,
                        id: idDestacado
                    }
                }).done(function(res){
                   
                    Swal.fire({
                        position: 'bottom-end',
                        icon: 'success',
                        title: 'El producto '+nombreProducto +' ha sido modificado' ,
                        showConfirmButton: false,
                        timer: 1500,
                        })
                    })     
            });

});             
            // $.ajax({
            //         url: "{{ route('producto.updateDestacado') }}",
            //         method: 'POST',
            //         dataType: 'json',
            //         data: {
            //             _token: $('input[name="_token"]').val(),
            //             status: statusDestacado,
            //             id: idDestacado
            //         }
            //         success: function(response) {
            //             console.log(response);
            //             $('.destacadoSwitch').html(response.html);
            //         },
            //         error: function(error) {
            //             console.error(error);
            //         }
            //      });


      

</script>

@stop
