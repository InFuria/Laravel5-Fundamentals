@extends('app')

@section('content')
    <h1>{{ $article->title }}</h1>

    <div class="content">
        <article>
            {{ $article->body }}
        </article>
    </div>

    <hr>

    @unless($article->tags->isEmpty())
    <h5>Tags:</h5>
    <ul>
        @foreach($article->tags as $tag)
            <li>{{ $tag->name }}</li>
            @endforeach
    </ul>
    @endunless

    <hr>
    <div>
        <a class="btn btn-primary" href="{{ route('articles.edit', ['id' => $article['id']])}}">EDITAR</a>
        <a class="btn btn-primary" href="{{ route('articles.index') }}">VOLVER</a>
    </div>


@stop