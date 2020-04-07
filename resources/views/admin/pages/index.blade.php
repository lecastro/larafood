@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" >Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('plans.index') }}" >Planos</a></li>
</ol>
<h1>Planos <a href="{{ route('plans.create') }}" class="btn btn-dark"><i class="fas fa-plus-square"></i></a></h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <form action="{{ route('plans.search') }}" method="POST" class="form form-inline">
            @csrf
            <input type="text" name="filter" placeholder="Nome" class="form-control">
            <button type="submit" class="btn btn-dark">filtrar</button>
        </form>
    </div>
    <div class="card-body">
        <table class="table table-condensend">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th width='150'>Ações</th>
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
                <td style="width=10px"> 
                    <a href="{{ route('plans.edit', $items->url) }}" class="btn btn-info">edit</a>
                    <a href="{{ route('plans.show', $items->url) }}" class="btn btn-warning">Ver</a>
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
