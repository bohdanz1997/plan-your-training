<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'exercise';

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
    protected $fillable = ['title', 'group_id'];

    public $timestamps = false;

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function templates()
    {
        return $this->belongsToMany(Template::class, 'exercise_template');
    }
}
