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
        'votes_quantity',
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

    /** Mutators */

    public function getVotesQuantityAttribute()
    {
        return (
            $this->votes()->wherePositive(true)->count() -
            $this->votes()->wherePositive(false)->count()
        );
    }

    /** Methods */

    public function isFrom(User $user)
    {
        return $this->user_id == $user->id;
    }
}
