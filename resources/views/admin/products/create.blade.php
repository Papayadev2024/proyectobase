@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
        <h2>Crear Producto</h2>
@stop

@section('content')

    <div class="container">
     
        <form method="POST" action="{{ route('admin.productos.store') }}">
            @csrf

            <x-adminlte-input type="text" name="name" label="Nombre" placeholder="Nombre del producto" label-class="text-lightblue" value="{{old('name')}}">
            <x-slot name=“prependSlot”>
                <div class=“input-group-text”>
                    <i class=“fas fa-user text-lightblue”></i>
                </div>
            </x-slot>
             </x-adminlte-input>


            <x-adminlte-select  name="category_id" label="Categoría" placeholder="Nombre de la categoría" label-class="text-lightblue" value="{{old('category')}}">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            <x-slot name=“prependSlot”>
                <div class=“input-group-text”>
                    <i class=“fas fa-user text-lightblue”></i>
                </div>
            </x-slot>
             </x-adminlte-select>


             <x-adminlte-select  name="type_id" label="Categoría" placeholder="Nombre de la categoría" label-class="text-lightblue" value="{{old('type_id')}}">
                @foreach ($types as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            <x-slot name=“prependSlot”>
                <div class=“input-group-text”>
                    <i class=“fas fa-user text-lightblue”></i>
                </div>
            </x-slot>
             </x-adminlte-select>


             <x-adminlte-input name="price" label="Precio" placeholder="Precio del producto" type="number" step="any"  label-class="text-lightblue" value="{{old('price')}}">
                <x-slot name="appendSlot">
                    <div class="input-group-text bg-lightblue">
                        <i class="fas fa-hashtag"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>

        
            <x-adminlte-input name="stock" label="Stock" placeholder="Stock del producto" type="number" step="any"  label-class="text-lightblue" value="{{old('stock')}}">
                <x-slot name="appendSlot">
                    <div class="input-group-text bg-lightblue">
                        <i class="fas fa-hashtag"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>


            <x-adminlte-button type="submit" label="Guardar Producto" theme="primary" icon="fas fa-save mr-2"/>
            
        </form>
    </div>
@stop

