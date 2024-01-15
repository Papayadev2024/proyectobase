@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
        <h2>Editar Categoría</h2>
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
     
        <form method="POST" action="{{ route('admin.categorias.update', $category->id) }}">
            @csrf
            @method('PUT')

            <x-adminlte-input type="text" name="name" label="Nombre" placeholder="Nombre de la categoría" label-class="text-lightblue" value="{{ $category->name, old('name')}}">
            <x-slot name=“prependSlot”>
                <div class=“input-group-text”>
                    <i class=“fas fa-user text-lightblue”></i>
                </div>
            </x-slot>
             </x-adminlte-input>

             <x-adminlte-input type="text" name="description" label="Descripción" placeholder="Descripción de la categoría" label-class="text-lightblue" value="{{$category->description, old('description')}}">
            <x-slot name=“prependSlot”>
                <div class=“input-group-text”>
                    <i class=“fas fa-user text-lightblue”></i>
                </div>
            </x-slot>
             </x-adminlte-input>

 
            <x-adminlte-button type="submit" label="Actualizar categoría" theme="primary" icon="fas fa-save mr-2"/>
            
        </form>
    </div>
@stop

