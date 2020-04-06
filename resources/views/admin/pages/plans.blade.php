@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
<h1>Planos <a href="{{ route('plans.create') }}" class="btn btn-dark">Add</a></h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <form action="{{ route('plans.search') }}" method="POST" class="form form-inline">
            @csrf
            <input type="text" name="filter" placeholder="Nome" class="form-control"
                value="{{ $filters['filter' ?? ''] }}">
            <button type="submit" class="btn btn-dark">filtrar</button>
        </form>
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
                    R${{ number_format($items->price, 2, ',', '.') }}
                </td>
                <td>
                    <a href="{{ route('plans.show',$items->url)}}" class="btn btn-warning">Ver</a>
                </td>

            </tr>

            @endforeach
        </table>
    </div>
    <div class="card-footer">
        @if (isset($filters))
        {{ $plans->appends($filters)->links() }}
        @else
        {{ $plans->links() }}
        @endif
    </div>
</div>
@stop
