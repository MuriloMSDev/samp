<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'adapter',
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

    public function languages()
    {
        return $this->belongsToMany(Language::class)
            ->withTimestamps()->withPivot('id');
    }
}
