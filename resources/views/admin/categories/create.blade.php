@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
        <h2>Crear Categoría</h2>
@stop

@section('content')

    <div class="container">
     
        <form method="POST" action="{{ route('admin.categorias.store') }}">
            @csrf

            <x-adminlte-input type="text" name="name" label="Nombre" placeholder="Nombre de la categoría" label-class="text-lightblue" value="{{old('name')}}">
            <x-slot name=“prependSlot”>
                <div class=“input-group-text”>
                    <i class=“fas fa-user text-lightblue”></i>
                </div>
            </x-slot>
             </x-adminlte-input>


            <x-adminlte-input type="text" name="description" label="Descripción" placeholder="Descripción de la categoría" label-class="text-lightblue" value="{{old('description')}}">
            <x-slot name=“prependSlot”>
                <div class=“input-group-text”>
                    <i class=“fas fa-user text-lightblue”></i>
                </div>
            </x-slot>
             </x-adminlte-input>


             <x-adminlte-input type="hidden" name="state" value="true">
             </x-adminlte-input>   
             
            <x-adminlte-button type="submit" label="Guardar categoría" theme="primary" icon="fas fa-save mr-2"/>
            
        </form>
    </div>
@stop

