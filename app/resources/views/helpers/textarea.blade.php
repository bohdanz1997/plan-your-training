<div class="form-group {{ $errors->has($field) ? 'has-error' : ''}}">
    {!! Form::label($field, ucfirst($field), ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::textarea($field, null, ['class' => 'form-control', 'required' => isset($required) ? $required : '']) !!}
        {!! $errors->first($field, '<p class="help-block">:message</p>') !!}
    </div>
</div>
