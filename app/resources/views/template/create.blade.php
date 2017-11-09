@extends('layouts.app')

@section('content')
    {!! Form::open(['route' => 'template.store', 'class' => 'form-horizontal']) !!}

    @include('template.partials.form')

    {!! Form::close() !!}
@endsection
