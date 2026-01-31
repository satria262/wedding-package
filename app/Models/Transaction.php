<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['user_id', 'wedding_package_id', 'total_price'];

    public function weddingPackage()
    {
        return $this->belongsTo(WeddingPackage::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
