<?php $exercise = $exerciseData['exercise'] ?>
<?php $set = $exerciseData['set'] ?>

<hr>
<div class="exercise">
    <span class="exercise-heading">
        {{ $loop->iteration }}. {{ $exercise->title }}
    </span>

    {{-- todo uncomment if need dynamicaly add new sets --}}
    {{--<button class="btn btn-primary btn-md pull-right training-add-action-btn">--}}
    {{--<span class="glyphicon glyphicon-plus" data-id="{{ $exercise->id }}"></span>--}}
    {{--</button>--}}

    <div id="exercises-{{ $exercise->id }}">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        {{--<th>Дата</th>--}}
                        <th>Підходи</th>
                        <th>Повтори</th>
                        <th>Вага, кг</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($set))
                        <tr>
                            {{--<td>{{ date('d/m', strtotime($set->date_start)) }}</td>--}}
                            <td>{{ $set->accesses }}</td>
                            <td>{{ $set->repetitions }}</td>
                            <td>{{ $set->weight }}</td>
                        </tr>
                    @endif
                    <tr>
                        {{--<td>Сьогодні</td>--}}
                        <td>
                            <input class="form-control"
                                   required
                                   name="{{'exercises['.$exercise->id.'][accesses]'}}"
                                   value="0">
                        </td>
                        <td>
                            <input class="form-control"
                                   required
                                   name="{{'exercises['.$exercise->id.'][repetitions]'}}"
                                   value="0">
                        </td>
                        <td>
                            <input class="form-control"
                                   required
                                   name="{{'exercises['.$exercise->id.'][weight]'}}"
                                   value="0">
                        </td>
                    </tr>
                    <tr id="last-{{ $exercise->id }}"></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>