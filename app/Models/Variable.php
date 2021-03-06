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
        'type',
        'optional',
        'default',
        'variable_group_id',
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

    public function variableGroup()
    {
        return $this->belongsTo(VariableGroup::class);
    }

    /** Mutators */

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = lcfirst($name);
    }
}
