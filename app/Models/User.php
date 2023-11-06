<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, softDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    /** Columns in Comment Table */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    /** RelationShip of User With FeedBack
     * A User can have many feedback
     * The primary id of user table will be used as foreign key in feedback table
     * @return HasMany
     */
    public function feedback()
    {
        return $this->hasMany(Feedback::class, 'user_id');
    }

    /** RelationShip of User With Comments
     * A User can have many comments
     * The primary id of user table will be used as foreign key in comment table
     * @return HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }
}
