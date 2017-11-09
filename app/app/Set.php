<?php

namespace App;

use function foo\func;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Set extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'set';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    public $timestamps = false;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['reps', 'weight', 'comment', 'position', 'exercise_id'];

    protected $casts = [
        'position' => 'integer',
        'reps' => 'integer',
        'weight' => 'float',
    ];

    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }

    public function workouts()
    {
        return $this->belongsToMany(Workout::class, 'set_workout');
    }
}
