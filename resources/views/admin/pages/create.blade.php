@extends('adminlte::page')

@section('title', 'Cadastrar um novo plano')

@section('content_header')
<h1>Cadastrar um novo plano</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('plans.store') }}" method="POST" class="form">
            @csrf
            @include('admin.pages._partials.form')
        </form>
    </div>
</div>
@endsection