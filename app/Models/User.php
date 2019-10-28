<?php

namespace App\Models;

use App\Notifications\ResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /** Relationships */

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function votes()
    {
        return $this->hasMany(CommentVote::class);
    }

    /** Mutators */

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    /** Methods */

    public function voted(Comment $comment, $positive)
    {
        return $this->votes()->where([
            'comment_id' => $comment->id,
            'positive' => $positive
        ])->exists();
    }

    /** Overrides */

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token, 'user'));
    }
}
