<div class="form-group {{ $errors->has($field) ? 'has-error' : ''}}">
    {!! Form::label($field, ucfirst(str_replace('_id', '', $field)), ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::select($field, $collection, $selected, ['class' => 'form-control', 'required' => isset($required) ? $required : '']) !!}
        {!! $errors->first($field, '<p class="help-block">:message</p>') !!}
    </div>
</div>
