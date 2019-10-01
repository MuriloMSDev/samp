<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content',
        'function_id',
        'user_id',
        'parent_id',
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function function()
    {
        return $this->belongsTo(FunctionModel::class);
    }

    public function votes()
    {
        return $this->hasMany(CommentVote::class);
    }

    public function children()
    {
        return $this->hasMany(static::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(static::class, 'parent_id');
    }

    public function allParentsComments()
    {
        return $this->parent()->with('allParentsComments');
    }

    public function allChildrenComments()
    {
        return $this->children()->with('allChildrenComments');
    }
}
