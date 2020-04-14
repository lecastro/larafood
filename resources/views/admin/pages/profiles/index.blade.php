@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" >Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}" >Perfis</a></li>
</ol>
<h1>Perfis <a href="{{ route('profiles.create') }}" class="btn btn-dark"><i class="fas fa-plus-square"></i></a></h1>
@stop

@section('content')
<div class="card">
    {{-- <div class="card-header">
        <form action="{{ route('plans.search') }}" method="POST" class="form form-inline">
            @csrf
            <input type="text" name="filter" placeholder="Nome" class="form-control">
            <button type="submit" class="btn btn-dark">filtrar</button>
        </form>
    </div> --}}
    <div class="card-body">
        <table class="table table-condensend">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th width='250'>Ações</th>
                </tr>
            </thead>
            @foreach ($profiles as $item)
            <tr>
                <td>
                    {{ $item->name }}
                </td>
                <td style="width=10px"> 
                    {{-- <a href="{{ route('details.profiles.index', $item->url) }}" class="btn btn-info">Detalhes</a> --}}
                    <a href="{{ route('profiles.edit', $item->id) }}" class="btn btn-info">edit</a>
                    <a href="{{ route('profiles.show', $item->id) }}" class="btn btn-warning">Ver</a>
                </td>
            </tr>

            @endforeach
        </table>
    </div>
    <div class="card-footer">
        @if (isset($filters))
        {{ $profiles->appends($filters)->links() }}
        @else
        {{ $profiles->links() }}
        @endif
    </div>
</div>
@stop
