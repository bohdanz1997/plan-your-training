@extends('layouts.app')

@section('content')
    <div class="training">
        <h4 class="training-heading">{{ $training->template->title }}</h4>

        {!! Form::open([
           'route' => 'training.abort',
           'class' => 'form-horizontal abort-form'
        ]) !!}
        {!! Form::button('Відмінити', [
            'type' => 'submit',
            'class' => 'btn btn-danger',
            'title' => 'Відмінити',
            'onclick'=>'return confirm("Confirm abort?")'
        ]) !!}
        {!! Form::close() !!}

        {!! Form::open([
            'route' => 'training.store',
            'class' => 'form-horizontal js-training-form'
        ]) !!}

        @foreach($exercisesData as $exerciseData)
            @include('training.partials.set-form')
        @endforeach

        <div class="form-group" style="margin-top: 20px;">
            <div class="col-sm-12">
                {!! Form::submit('Завершити', [
                    'class' => 'btn btn-success col-xs-12 js-training-form-submit',
                    'required'
                ]) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection

