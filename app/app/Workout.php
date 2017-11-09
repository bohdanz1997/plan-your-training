<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'workout';

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
    protected $fillable = ['datetime', 'weekday'];

    protected $dates = [
        'datetime'
    ];

    protected $casts = [
        'datetime' => 'date'
    ];

    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    public function sets()
    {
        return $this->belongsToMany(Set::class, 'set_workout');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
