<div class="form-group {{ $errors->has($field) ? 'has-error' : ''}}">
    {!! Form::label($field, ucfirst($field), ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::file($field, ['class' => 'form-control']) !!}
        {!! $errors->first($field, '<p class="help-block">:message</p>') !!}
    </div>
</div>
