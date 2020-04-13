@include('admin.pages.plans.includes.alerts')

<div class="form-grup">
    <label for="name">Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{ $plans->name ?? old('name') }}">
</div>

<div class="form-grup">
    <label for="price">Preço:</label>
    <input type="text" name="price" class="form-control" placeholder="Preço:" value="{{ $plans->price ?? old('price') }}">
</div>

<div class="form-grup">
    <label for="description">Descrição:</label>
    <input type="text" name="description" class="form-control" placeholder="Descrição:" value="{{ $plans->description ?? old('description') }}">
</div>
<br>
<div class="form-grup">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>