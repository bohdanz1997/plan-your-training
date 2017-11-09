@extends('layouts.app')

@section('content')
    @include('partials.manage-training')

    @include('training.partials.delete-form')

    @forelse($history as $template => $exercises)
        <div class="">
            <h4>{{ $template }}</h4>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <?php $sets = reset($exercises) ?>
                        <tr>
                            <th>Вправа</th>
                            @foreach($sets as $set)
                                <th>{{ date('d/m', strtotime($set['date_start'])) }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($exercises as $exercise => $sets)
                        <tr>
                            <td>{{ $loop->iteration }}. {{ $exercise }}</td>
                            @foreach($sets as $set)
                                <td>{{ $set['accesses'] }}x{{ $set['repetitions'] }}x{{ $set['weight'] }}
                                </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <hr>
        </div>
    @empty
        <h2>У вас поки немає закінчених тренувань!</h2>
    @endforelse

@endsection
