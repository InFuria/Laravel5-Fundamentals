@extends('app')

@section('content')
    <h1>Articulos</h1>
    <a class="btn btn-primary" href="{{ url('articles/create') }}">CREAR</a>

    <hr/>

    @foreach ($articles as $article)
        <article>
            <h2>
                <a href="{{ url('/articles', $article->id) }}">{{ $article->title }}</a>
            </h2>

            <div class="body">{{ $article->body }}</div>

        </article>
    @endforeach

@stop