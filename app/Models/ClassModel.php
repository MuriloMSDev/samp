<?php

namespace App\Models;

use App\Traits\Parameters;
use App\Traits\Views;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use Parameters;
    use Views;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'classes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'views',
        'project_id',
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

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function functions()
    {
        return $this->hasMany(FunctionModel::class, 'class_id');
    }

    public function examples()
    {
        return $this->morphMany(Example::class, 'entity');
    }
}
