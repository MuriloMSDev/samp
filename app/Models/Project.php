<?php

namespace App\Models;

use App\Enums\ProjectType;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'type_enum',
        'views',
        'user_id',
        'language_tool_id',
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

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'type',
    ];

    /** Relationships */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function languageTool()
    {
        return $this->belongsTo(LanguageTool::class);
    }

    public function language()
    {
        return $this->languageTool->language();
    }

    public function tool()
    {
        return $this->languageTool->tool();
    }

    /** Mutators */

    public function getTypeAttribute()
    {
        return ProjectType::getDescription($this->type_enum) ?: null;
    }
}
