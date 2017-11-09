{!! Form::open([
    'method'=>'DELETE',
    'route' => ['training.clear'],
    'style' => 'display:inline'
]) !!}
{!! Form::button('Очистити історію', [
        'type' => 'submit',
        'class' => 'btn btn-danger',
        'title' => 'Delete Training',
        'onclick'=>'return confirm("Confirm delete?")'
]) !!}
{!! Form::close() !!}