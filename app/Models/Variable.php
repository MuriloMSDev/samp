<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variable extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'content',
        'type',
        'for_enum',
        'optional',
        'entity_id',
        'entity_type',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /** Relationships */

    public function entity()
    {
        return $this->morphTo();
    }

    /** Mutators */

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = lcfirst($name);
    }
}
