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
        return $this->hasOneThrough(
            Language::class,
            LanguageTool::class,
            'id',
            'id',
            'language_tool_id',
            'language_id'
        );
    }

    public function tool()
    {
        return $this->languageTool->tool();
    }

    public function classes()
    {
        return $this->hasMany(ClassModel::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'entity');
    }

    /** Mutators */

    public function getTypeAttribute()
    {
        return ProjectType::getDescription($this->type_enum) ?: null;
    }

    /** Methods */

    public function isRestful()
    {
        return $this->type_enum == ProjectType::RESTFUL;
    }

    public function isNonRestful()
    {
        return $this->type_enum == ProjectType::NON_RESTFUL;
    }
}
