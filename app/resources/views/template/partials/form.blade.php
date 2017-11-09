<h2>
    Новий шаблон тренувань
    {!! Form::submit('Створити', ['class' => 'btn btn-primary js-submit pull-right', 'required']) !!}
</h2>
<hr>

<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <div class="col-sm-12">
        {!! Form::label('title', 'Назва', ['class' => ' control-label']) !!}
        {!! Form::text('title', null, ['class' => 'form-control', 'required']) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('groups') ? 'has-error' : ''}}">
    <div class="col-sm-12">
        {!! Form::label('groups', 'Фільтр по групі м\'язів', ['class' => ' control-label']) !!}
        {!! Form::select('groups', $groups, null, ['class' => 'form-control js-select-group', 'placeholder' => 'Вибери', 'required']) !!}
        {!! $errors->first('groups', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('ex') ? 'has-error' : ''}}">
    <div class="col-sm-12">
        {!! Form::label('ex', 'Вправи', ['class' => ' control-label']) !!}
        {!! Form::select('ex[]', $exercises, [], ['class' => 'form-control js-select-exercises css-select', 'multiple',  'required']) !!}
        {!! $errors->first('ex', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-12">
        {!! Form::label('out-ex', 'Вибрані вправи', ['class' => ' control-label']) !!}
        {!! Form::select('out-ex[]', [], [], ['class' => 'form-control js-select-out-ex css-select', 'multiple']) !!}
    </div>
</div>

<span id="exercises-container"></span>
