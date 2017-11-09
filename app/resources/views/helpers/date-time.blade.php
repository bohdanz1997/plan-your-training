<div class="form-group {{ $errors->has($field) ? 'has-error' : ''}}">
    {!! Form::label($field, ucfirst($field), ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        <input class="form-control" required="" name="{{ $field }}" type="datetime-local" id="{{ $field }}">
        {!! $errors->first($field, '<p class="help-block">:message</p>') !!}
    </div>
</div>