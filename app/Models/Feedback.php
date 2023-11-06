<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model
{
    use HasFactory, SoftDeletes;

    /** Columns in Feedback Table */
    protected $fillable = [
        'product_id', 'user_id', 'title', 'description', 'category',
    ];

    /** RelationShip of FeedBack With User
     * A feedback belongs to a User
     * The primary id of User table will be used as foreign key in feedback table
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /** RelationShip of FeedBack With Product
     * A feedback belongs to a product
     * The primary id of Product table will be used as foreign key in feedback table
     */
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }


    /** RelationShip of FeedBack with Comments
     * A FeedBack can has many comments
     * The primary id of FeedBack table will be used as foreign key in Comment table
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get Feedback By productID
     * @param $query
     * @param $pid
     * @return mixed
     */
    public function scopeGetByProductId($query, $pid){
        return $query->where('product_id', $pid);
    }
}
