@extends('layout')

@section('cabecalho')
Adicionar Série
@endsection

@section('conteudo')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <label for="nome" class="">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" />
        </div>
        <div class="col-md-2">
            <label for="qtd_temporadas" class="">Nº temporadas</label>
            <input type="number" class="form-control" name="qtd_temporadas" id="qtd_temporadas" />
        </div>
        <div class="col-md-2">
            <label for="ep_por_temporada" class="">Ep por temporada</label>
            <input type="number" class="form-control" name="ep_por_temporada" id="ep_por_temporada" />
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <label for="capa" class="">Capa</label>
            <input type="file" class="form-control" name="capa" id="capa" />
        </div>
    </div>

    <button class="btn btn-primary mt-2">Adicionar</button>
</form>
@endsection