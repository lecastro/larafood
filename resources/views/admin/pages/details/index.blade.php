@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" >Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('plans.index') }}" >Planos</a></li>
    <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}" >{{ $plan->name }}</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('details.plans.index', $plan->url) }}" class="active">Detalhes do plano</a></li>
</ol>
<h1>Detalhes do plano <a href="{{ route('details.plans.create', $plan->url) }}" class="btn btn-dark"><i class="fas fa-plus-square"></i></a></h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-condensend">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th width='150'>Ações</th>
                </tr>
            </thead>
            @foreach ($details as $items)
            <tr>
                <td>
                    {{ $items->name }}
                </td>
               
                <td style="width=10px"> 
                    {{-- <a href="{{ route('plans.edit', $items->url) }}" class="btn btn-info">edit</a>
                    <a href="{{ route('plans.show', $items->url) }}" class="btn btn-warning">Ver</a> --}}
                </td>
            </tr>

            @endforeach
        </table>
    </div>
    <div class="card-footer">
        @if (isset($filters))
        {{ $details->appends($filters)->links() }}
        @else
        {{ $details->links() }}
        @endif
    </div>
</div>
@stop
