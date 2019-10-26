<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VariableGroup extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'for_enum',
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

    public function variables()
    {
        return $this->hasMany(Variable::class);
    }

    public function example()
    {
        return $this->morphOne(Example::class, 'entity');
    }
}
