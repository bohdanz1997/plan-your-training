{!! Form::open([
    'method'=>'DELETE',
    'route' => ['template.destroy', $template->id],
    'style' => 'display:inline'
]) !!}
{!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Template" />', [
        'type' => 'submit',
        'class' => 'btn btn-danger',
        'title' => 'Delete Template',
        'onclick'=>'return confirm("Confirm delete?")'
]) !!}
{!! Form::close() !!}