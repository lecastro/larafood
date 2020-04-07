@extends('adminlte::page')

@section('title', 'Atualizar dados do plano')

@section('content_header')
<h1>Atualizar dados do plano</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('plans.update', $plans->url) }}" method="POST" class="form">
            @csrf
            @method('PUT')
           @include('admin.pages._partials.form')
        </form>
    </div>
</div>
@endsection