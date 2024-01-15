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

            <x-adminlte-input type="text" name="name" label="Nombre" placeholder="Nombre del producto" label-class="text-lightblue" value="{{ $producto->name, old('name')}}">
            <x-slot name=“prependSlot”>
                <div class=“input-group-text”>
                    <i class=“fas fa-user text-lightblue”></i>
                </div>
            </x-slot>
             </x-adminlte-input>

             <x-adminlte-select  name="category" label="Categoría" placeholder="Nombre de la categoría" label-class="text-lightblue" value="{{old('category')}}">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            <x-slot name=“prependSlot”>
                <div class=“input-group-text”>
                    <i class=“fas fa-user text-lightblue”></i>
                </div>
            </x-slot>
             </x-adminlte-select>

             <x-adminlte-input name="price" label="Precio" placeholder="Precio del producto" type="number" step="any"  label-class="text-lightblue" value="{{$producto->price, old('price')}}">
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

