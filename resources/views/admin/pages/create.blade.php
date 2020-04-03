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
           
            <div class="form-grup">
                <label for="name">Nome:</label>
                <input type="text" name="name" class="form-control" placeholder="Nome:">
            </div>

            <div class="form-grup">
                <label for="price">Preço:</label>
                <input type="text" name="price" class="form-control" placeholder="Preço:">
            </div>

            <div class="form-grup">
                <label for="description">Descrição:</label>
                <input type="text" name="description" class="form-control" placeholder="Descrição:">
            </div>
            <br>
            <div class="form-grup">
                <button type="submit" class="btn btn-dark">Enviar</button>
            </div>
        </form>
    </div>
</div>
@endsection