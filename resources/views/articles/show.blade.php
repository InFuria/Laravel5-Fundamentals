@extends('app')

@section('content')
    <h1>{{ $article->title }}</h1>

    <div class="content">
        <article>
            {{ $article->body }}
        </article>
    </div>

    <hr>

    <div>
        <a class="btn btn-primary" href="{{ route('articles.edit', ['id' => $article['id']])}}">EDITAR</a>
        <a class="btn btn-primary" href="{{ route('articles.index') }}">VOLVER</a>
    </div>

@stop