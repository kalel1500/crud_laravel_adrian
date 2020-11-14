@extends('layouts.app')

@section('title', 'Page Title')

@section('content')


    <div class="btn-group my-3">
        <a class="btn btn-secondary" href="{{ route('dashboard.index', [$dashboardManager->prevYear, $dashboardManager->prevMonth]) }}">Mes Anterior</a>
        <a class="btn btn-secondary" href="{{ route('dashboard.index', [$dashboardManager->nextYear, $dashboardManager->nextMonth]) }}">Mes Siguente</a>
    </div>

    <div class="row">

        @forelse($dashboardManager->posts as $post)
            <div class="col-sm-3">
            <div class="card bg-light mb-3">
                <div class="card-header">{{ '@'.$post->user->username }}<span class="small">[{{ $post->user->name }} - {{ $post->user->surname }}]</span></div>
                <div class="card-body">
                    <a href="{{ route('dashboard.post', $post->id) }}"><h5 class="card-title">{{ $post->title }}</h5></a>
                    <p class="card-text">{{ $post->content }}</p>
                </div>
            </div>
            </div>
        @empty

            <p class="alert alert-danger">No se han encontrado registros</p>

        @endforelse



    </div>
@endsection
