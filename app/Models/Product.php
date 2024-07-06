<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class);
    }
    protected $fillable = [
        'name',
        'image_url',
        'description',
        'price',
        'id_category',
        'stock',
        'min_stock',
    ];
}
