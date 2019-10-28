<?php

namespace App\Models;

use App\Enums\FunctionType;
use App\Enums\VariableType;
use App\Traits\Parameters;
use App\Traits\Views;
use Illuminate\Database\Eloquent\Model;

class FunctionModel extends Model
{
    use Parameters;
    use Views;

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
        'type_enum',
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

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'type',
    ];

    /** Relationships */

    public function class()
    {
        return $this->belongsTo(ClassModel::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'function_id');
    }

    public function returns()
    {
        return $this->morphOne(VariableGroup::class, 'entity')
            ->where('for_enum', VariableType::RETURN);
    }

    public function success()
    {
        return $this->morphOne(VariableGroup::class, 'entity')
            ->where('for_enum', VariableType::SUCCESS);
    }

    public function error()
    {
        return $this->morphOne(VariableGroup::class, 'entity')
            ->where('for_enum', VariableType::ERROR);
    }

    public function header()
    {
        return $this->morphOne(VariableGroup::class, 'entity')
            ->where('for_enum', VariableType::HEADER);
    }

    public function examples()
    {
        return $this->morphMany(Example::class, 'entity');
    }

    /** Mutators */

    public function getTypeAttribute()
    {
        return FunctionType::getDescription($this->type_enum) ?: null;
    }
}
