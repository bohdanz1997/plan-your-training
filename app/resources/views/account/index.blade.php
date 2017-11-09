@extends('layouts.app')

@section('content')
    {{--@include('partials.manage-training')--}}

    {{--<div class="btn-group">--}}
        {{--<a href="{{ route('training.history') }}" class="btn btn-default">Історія тренувань</a>--}}
        {{--<a href="{{ route('training.history') }}" class="btn btn-default">Статистика</a>--}}
    {{--</div>--}}
    {{--<h3>--}}
        {{--Всі шаблони--}}
        {{--<a href="{{ route('template.create') }}" class="btn btn-success">--}}
            {{--<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>--}}
        {{--</a>--}}
    {{--</h3>--}}

    @foreach($templates as $template)
        <div class="list-group col-md-6">
            <div class="list-group-item">
                <h4>{{ $template->title }}</h4>
                <span class="pull-right template-delete-btn">
                    @include('account.partials.form-delete-template')
                </span>
                @foreach($template->exercises as $exercise)
                    <p>{{ $loop->iteration }}. {{ $exercise->title }}</p>
                @endforeach
            </div>
        </div>
    @endforeach

@endsection
