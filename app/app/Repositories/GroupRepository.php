<?php
/**
 * Created by PhpStorm.
 * User: bogdan
 * Date: 09.11.17
 * Time: 23:11
 */

namespace App\Repositories;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class GroupRepository
{
    public function getWithFields($data)
    {
        /* @var Builder $query */
        $query = DB::table('group');

        foreach ($data as $field) {
            $query->addSelect('group.'.$field);
        }

        $query->join('exercise', 'group.id', '=', 'exercise.group_id');

        dd($query->get());

//        dd($query);
    }
}