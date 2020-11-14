@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

    <div class="card">

        <h5 class="card-header">Escrito por: {{ '@'.$postViewManager->post->user->username }}</h5>

        <div class="card-body">
            <h5 class="card-title">{{ $postViewManager->post->title }}</h5>
            <p class="card-text">{{ $postViewManager->post->content }}</p>
        </div>

    </div>

    <div class="card">

        <h6 class="card-header">Comentarios</h6>

        @forelse($postViewManager->post->comments as $comment)
            <div class="card-body">
                <p class="card-title">{{ '@'.$comment->user->username }}</p>
                <p class="card-text">{{ $comment->content }}</p>
            </div>
        @empty
            <p class="alert alert-danger">No se han encontrado comentarios</p>
        @endforelse

    </div>

@endsection
