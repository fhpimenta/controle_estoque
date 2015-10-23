@extends('layout.principal')

@section('conteudo')

    <h1>Editar Produto</h1>

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{ Form::model($p,['route' => 'produto.atualizar', $p->id ]) }}
    {{ Form::token() }}

    <div class="form-group">
        {{ Form::label('nome', 'Nome*') }}
        {{ Form::text('nome','',['class' => 'form-control'] ) }}
    </div>

    <div class="form-group">
        {{ Form::label('descricao', 'Descrição') }}
        {{ Form::text('descricao','', ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('valor', 'Valor') }}
        {{ Form::text('valor','',['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('quantidade', 'Quantidade') }}
        {{ Form::number('quantidade',['class' => 'form-control']) }}
    </div>

    {{ Form::submit('Atualizar', ['class' => 'btn btn-primary btn-block']) }}

    {{ Form::close() }}

@stop
