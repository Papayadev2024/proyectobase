@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Categorías</h1>
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
        <a href="{{route('admin.categorias.create')}}"  class="btn btn-primary"> Nueva categoría </a> 
    </div>
    <div class="card">
      <div class="card-body">
        
      <table id="tablecategory" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>CATEGORIA</th>
                <th>DESCRIPCIÓN</th>
                <th>ACCIONES</th>
              
            </tr>
        </thead>
        <tbody>
            @foreach ($category as $categoria)
                <tr>
                    <td>{{$categoria->id}}</td>
                    <td>{{$categoria->name}}</td>
                    <td>{{$categoria->description}}</td>
                    
                    <td style="display: flex; align-items: center; gap: 8px;">
                        <a  href="{{route('admin.categorias.edit', $categoria)}}" class="btn btn-primary btn-sm" ><i class="far fa-edit"></i></a>
                        <form method="POST" action=""> 
                            @csrf 
                            <a class="btn btn-danger btn-sm btn_delete" data-idUser='{{$categoria->id}}'><i class="far fa-trash-alt "></i></a>
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
           
         new DataTable('#tablecategory');

//             //para eliminar registro
//             $( ".btn_delete" ).on( "click", function(e) {
                
//                 var id = $(this).attr('data-idUser');

//                 Swal.fire({
//                     title: "Seguro que deseas Elimnar?",
//                     text: "Vas a Liminar un producto",
//                     icon: "warning",
//                     showCancelButton: true,
//                     confirmButtonColor: "#3085d6",
//                     cancelButtonColor: "#d33",
//                     confirmButtonText: "Si, borrar!",
//                     cancelButtonText: "Cancelar"
//                     }).then((result) => {
//                     if (result.isConfirmed) {
                        
//                         $.ajax({
//                                 url: "{{ route('producto.deleteProducto') }}",
//                                 method: 'POST',
//                                 data:{
//                                     _token: $('input[name="_token"]').val(),
//                                     id: id    
//                                 }
                               
//                         }).done(function(res){
                   
//                             Swal.fire({
//                                 title: "Producto eliminado",
//                                 text: "xxxxxxxxxxx",
//                                 icon: "success"
//                                 });
                          
//                          })         
                       

//                     }
//                     });

//             });
        
//             $( ".btn_swithc" ).on( "change", function() {
                
//                 var status = 0;
//                 var id = $(this).attr('data-idUser');
//                 var nombreProducto = $(this).attr('data-nameUser');
//                 var field = $(this).attr('data-field');
               
//                 if( $(this).is(':checked') ){
//                     status = 1;
//                 }else{
//                     status = 0;
//                  }



//                 $.ajax({
//                     url: "{{ route('producto.updateDestacado') }}",
//                     method: 'POST',
//                     data:{
//                         _token: $('input[name="_token"]').val(),
//                         status: status,
//                         id: id,
//                         field: field,
//                     }
//                 }).done(function(res){
                   
//                     Swal.fire({
//                         position: "top-end",
//                         icon: "success",
//                         title: nombreProducto +" a sido modificado",
//                         showConfirmButton: false,
//                         timer: 1500

//                     }); 

//                 })     
//             });

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
