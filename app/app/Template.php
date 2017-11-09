<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'template';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'comment', 'position', 'user_id'];

    public $timestamps = false;

    public function workouts()
    {
        return $this->hasMany(Workout::class);
    }

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'exercise_template');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
