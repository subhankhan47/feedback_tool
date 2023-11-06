<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, softDeletes;

    /** Columns in Comment Table */
    protected $fillable = [
        'user_id', 'feedback_id', 'content',
    ];


    /** RelationShip of Comment With User
     * A Comment belongs to a User
     * The primary id of User table will be used as foreign key in comment table
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /** RelationShip of Comment With Feedback
     * A Comment belongs to a Feedback
     * The primary id of feedback table will be used as foreign key in comment table
     */
    public function feedback()
    {
        return $this->belongsTo(Feedback::class);
    }

}
