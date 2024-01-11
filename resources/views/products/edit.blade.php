@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
        <h2>Editar Producto</h2>
@stop


@section('content')


    @if (session('mensaje'))

        <div class="alert alert-success">
            <strong>
                {{session('mensaje')}}
            </strong>

        </div>

    @endif

    <div class="container">
     
        <form method="POST" action="{{ route('admin.productos.update', $producto->id) }}">
            @csrf
            @method('PUT')

            <x-adminlte-input type="text" name="nombre" label="Nombre" placeholder="Nombre del producto" label-class="text-lightblue" value="{{ $producto->nombre, old('nombre')}}">
            <x-slot name=“prependSlot”>
                <div class=“input-group-text”>
                    <i class=“fas fa-user text-lightblue”></i>
                </div>
            </x-slot>
             </x-adminlte-input>

             <x-adminlte-input type="text" name="categoria" label="Categoría" placeholder="Nombre de la categoría" label-class="text-lightblue" value="{{$producto->categoria, old('categoria')}}">
            <x-slot name=“prependSlot”>
                <div class=“input-group-text”>
                    <i class=“fas fa-user text-lightblue”></i>
                </div>
            </x-slot>
             </x-adminlte-input>

             <x-adminlte-input name="precio" label="Precio" placeholder="Precio del producto" type="number" step="any"  label-class="text-lightblue" value="{{$producto->precio, old('precio')}}">
                <x-slot name="appendSlot">
                    <div class="input-group-text bg-lightblue">
                        <i class="fas fa-hashtag"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>

            <x-adminlte-input name="stock" label="Stock" placeholder="Stock del producto" type="number" step="any"  label-class="text-lightblue" value="{{$producto->stock, old('stock')}}">
                <x-slot name="appendSlot">
                    <div class="input-group-text bg-lightblue">
                        <i class="fas fa-hashtag"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>


            <x-adminlte-button type="submit" label="Actualizar Producto" theme="primary" icon="fas fa-save mr-2"/>
            
        </form>
    </div>
@stop

