<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, softDeletes;

    /** Columns in Product Table */
    protected $fillable = [
        'image', 'name', 'description', 'price'
    ];

    /** RelationShip of Product With FeedBack
     * A product can has many feedback
     * The primary id of Product table will be used as foreign key in feedback table
     */
    public function feedback(){
        $this->hasMany(Feedback::class, 'product_id');
    }


    /**
     * Scope Resolution to get All Products in Ascending order
     * Based On their Created At.
     * @param $query
     * @return mixed
     */
    public function scopeGetAllProducts($query){
        return $query->orderBy('created_at', 'asc');
    }
}
