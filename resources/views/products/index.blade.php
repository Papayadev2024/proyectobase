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
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>CATEGORIA</th>
                    <th>PRECIO</th>
                    <th>STOCK</th>
                    <th>DESTACADO</th>
                    <th>VISIBLE</th>
                    <th colspan="2"></th>
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
                            <x-adminlte-input-switch name="Destacado" />
                            </td>
                            <td>
                            <x-adminlte-input-switch name="Visible" />
                              
                            </td>
                            <td width="15px"><a href="{{route('admin.productos.edit', $producto)}}" class="btn btn-primary btn-sm">Editar</a></td>
                            <td width="15px"><form action="{{route('admin.productos.destroy', $producto)}}" method="POST">
                                @method('delete')
                                @csrf
                                <input type="submit" value="Eliminar" class="btn btn-danger btn-sm">
                            </form></td>
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
            Swal.fire({
            title: 'Error!',
            text: 'Do you want to continue',
            icon: 'error',
            confirmButtonText: 'Cool'
            })
        });
</script>
@stop
