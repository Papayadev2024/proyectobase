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
                <th>TIPO</th>
                <th>PRECIO</th>
                <th>STOCK</th>
                <th>DESTACADO</th>
                <th>VISIBLE</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td>{{$producto->id}}</td>
                    <td>{{$producto->name}}</td>
                    <td>{{$producto->category->name}}</td>
                    <td>{{$producto->type->name}}</td>
                    <td>{{$producto->price}}</td>
                    <td>{{$producto->stock}}</td>
                    <td>
                        <form method="POST" action="">
                                @csrf
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input check_d btn_swithc" id='{{'d_'.$producto->id}}' data-field='destacado' data-idUser='{{$producto->id}}' data-nameUser='{{$producto->name}}' {{$producto->destacado == 1 ? 'checked' : ''}}>
                                <label class="custom-control-label" for="{{'d_'.$producto->id}}"></label>
                            </div>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="">
                                @csrf
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input check_v btn_swithc" id='{{'v_'.$producto->id}}' data-field='visible' data-idUser='{{$producto->id}}' data-nameUser='{{$producto->name}}' {{$producto->visible == 1 ? 'checked' : ''}} >
                                <label class="custom-control-label" for="{{'v_'.$producto->id}}"></label>
                            </div>
                        </form>
                    </td>
                    <td width="30px" >
                        <a href="{{route('admin.productos.edit', $producto)}}" class="btn btn-primary btn-sm" ><i class="far fa-edit"></i></a>
                        
                        <form method="POST" action=""> 
                         @csrf 
                         <a class='btn_delete' data-idUser='{{$producto->id}}'><i class="far fa-trash-alt"></i></a>
                        </form>
                        {{--
                        <form action="{{route('admin.productos.destroy', $producto)}}" method="POST">
                            @method('delete')
                            @csrf
                            <input type="submit" value="Eliminar" class="btn btn-danger btn-sm">
                        </form>
                        --}}
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

            //para eliminar registro
            $( ".btn_delete" ).on( "click", function(e) {
                
                var id = $(this).attr('data-idUser');

                Swal.fire({
                    title: "Seguro que deseas Elimnar?",
                    text: "Vas a Liminar un producto",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, borrar!",
                    cancelButtonText: "Cancelar"
                    }).then((result) => {
                    if (result.isConfirmed) {
                        
                        $.ajax({
                                url: "{{ route('producto.deleteProducto') }}",
                                method: 'POST',
                                data:{
                                    _token: $('input[name="_token"]').val(),
                                    id: id    
                                }
                               
                        }).done(function(res){
                   
                            Swal.fire({
                                title: "Producto eliminado",
                                text: "xxxxxxxxxxx",
                                icon: "success"
                                });
                          
                         })         
                       

                    }
                    });

            });
        
            $( ".btn_swithc" ).on( "change", function() {
                
                var status = 0;
                var id = $(this).attr('data-idUser');
                var nombreProducto = $(this).attr('data-nameUser');
                var field = $(this).attr('data-field');
               
                if( $(this).is(':checked') ){
                    status = 1;
                }else{
                    status = 0;
                 }



                $.ajax({
                    url: "{{ route('producto.updateDestacado') }}",
                    method: 'POST',
                    data:{
                        _token: $('input[name="_token"]').val(),
                        status: status,
                        id: id,
                        field: field,
                    }
                }).done(function(res){
                   
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: nombreProducto +" a sido modificado",
                        showConfirmButton: false,
                        timer: 1500

                    }); 

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
