<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LanguageTool extends Model
{
    /**
     * The attributes that defines which table to use.
     *
     * @var string
     */
    protected $table = 'language_tool';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language_id',
        'tool_id',
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

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function tool()
    {
        return $this->belongsTo(Tool::class);
    }
}
