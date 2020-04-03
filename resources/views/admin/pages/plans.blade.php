@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
<h1>Planos</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        #filtros 
        <a href="{{ route('plans.create') }}" class="btn btn-dark">Add</a>
    </div>
    <div class="card-body">
        <table class="table table-condensend">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th width='50'>Ações</th>
                </tr>
            </thead>
            @foreach ($plans as $items)
            <tr>
                <td>
                    {{ $items->name }}
                </td>
                <td>
                    {{ $items->price }}
                </td>
                <td>
                    <a href="#" class="btn btn-warning">Ver</a>
                </td>

            </tr>

            @endforeach
        </table>
    </div>
    <div class="card-footer">
        {{ $plans->links() }}
    </div>
</div>
@stop
