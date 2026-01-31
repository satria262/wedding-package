<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeddingPackage extends Model
{
    protected $fillable = ['name', 'price', 'description', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function bonuses()
    {
        return $this->hasMany(WeddingPackageBonus::class);
    }

    public function testimonials()
    {
        return $this->hasMany(WeddingPackageTestimonial::class);
    }
}
