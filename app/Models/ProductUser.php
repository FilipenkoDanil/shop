<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ProductUser extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class)->with('images')->with('category');
    }
}
