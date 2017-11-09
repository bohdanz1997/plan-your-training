@extends('layouts.app')

@section('content')
    <h3>Спочатку заверши поточне тренування</h3>
    <div class="alert alert-info">
        <a class="alert-link" href="{{ route('training.show-active') }}">
            Перейти до активного тренування
        </a>
    </div>
@endsection