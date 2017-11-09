{!! Form::open(['route' => 'training.start', 'class' => 'form-horizontal css-start-training-form js-start-training-form']) !!}

<div class="form-group">
    <div class="col-sm-12">
        {!! Form::select('template_id',
            array_pluck(Auth::user()->templates->toArray(), 'title', 'id'), null,
            ['class' => 'form-control', 'placeholder' => 'Вибери шаблон для початку тренування', 'required'])
        !!}
    </div>
</div>

{!! Form::close() !!}