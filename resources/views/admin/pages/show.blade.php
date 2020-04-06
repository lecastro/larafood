@extends('adminlte::page')

@section('title', 'Detalhes')

@section('content_header')
<h1>Detalhes do plano <b>{{ $plans->name }}</b></h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <ul>
            <li>
                <strong>Nome:</strong> {{ $plans->name }}
            </li>
            <li>
                <strong>URL:</strong> {{ $plans->url }}
            </li>
            <li>
                <strong>Preço:</strong> R${{ number_format($plans->price, 2, ',', '.') }}
            </li>
            <li>
                <strong>Descrição:</strong> {{ $plans->description }}
            </li>
        </ul>
    </div>
</div>

@endsection
