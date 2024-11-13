<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'images',
    ];

    // Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }  

    // Variants
    public function variants()
    {
        return $this->hasMany(Variant::class);
    }

    // Images
    public function getImagesAttribute($value)
    {
        return json_decode($value, true); // Decode JSON string to an associative array
    }

    // Mutator for the images attribute
    public function setImagesAttribute($value)
    {
        $this->attributes['images'] = json_encode($value); // Encode array to JSON string
    }

    // Cart
    public function inCart($user): boolval
    {
        return $user->cart()->where('product_id', $this->id)->count() > 0;
    }

    // public function inWishlist($user): boolval
    // {
    //     return $user->wishlist()->where('product_id', $this->id)->count() > 0;
    // }


    public function getStockAttribute()
    {
        return $this->variants()->sum('stock');
    }

    //Product Reviews

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getRatingAttribute()
    {
        return $this->reviews()->avg('rating');
    }
    
    public function getReviewsCountAttribute()
    {
        return $this->reviews()->count();
    }

    public function orders()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getOrdersCountAttribute()
    {
        return $this->orders()->count();
    }

    public function getSalesAttribute()
    {
        return $this->orders()->sum('quantity');
    }
}
