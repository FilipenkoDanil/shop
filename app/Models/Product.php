<?php

namespace App\Models;

use App\Models\ProductImage;
use App\Models\Traits\Translatable;
use App\Services\CurrencyConversion;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Translatable;

    protected $fillable = ['alias', 'name', 'manufacturer', 'price', 'old_price', 'description', 'description_en', 'count', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getPriceForCount()
    {
        if (!is_null($this->pivot)) {
            return $this->pivot->count * $this->pivot->price;
        }
        return $this->price;
    }

    public function isAvailable()
    {
        return $this->count > 0;
    }

    public function getPriceAttribute($value)
    {
        return round(CurrencyConversion::convert($value), 2);
    }

    public function getOldPriceAttribute($value)
    {
        return round(CurrencyConversion::convert($value), 2);
    }

    public function updateRating()
    {
        if (count($this->comments->where('status', 1)) > 0) {
            $this->rating = round($this->comments->where('status', 1)->sum('rating') / count($this->comments->where('status', 1)));
        } else {
            $this->rating = 0;
        }
        $this->save();

        return true;
    }

}
