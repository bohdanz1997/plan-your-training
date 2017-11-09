<div class="row">
    @if (Auth::user()->hasActiveTraining())
        <div class="col-md-12">
            <div class="alert alert-info">
                <a class="alert-link" href="{{ route('training.show-active') }}">
                    Перейти до активного тренування
                </a>
            </div>
        </div>
    @else
        <div class="col-md-12">
            @include('training.partials.choose-template-form')
        </div>
    @endif
</div>