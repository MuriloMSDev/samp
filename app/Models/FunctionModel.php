<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FunctionModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'functions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'content',
        'url',
        'method',
        'views',
        'class_id',
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

    public function class()
    {
        return $this->belongsTo(ClassModel::class);
    }

    public function parameters()
    {
        return $this->hasMany(Parameter::class);
    }
}
