<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Define the fillable attributes to avoid mass assignment errors
    protected $fillable = [
        'category_id',
        'subcategory_id',
        'title',
        'description',
        'main_image',
        'image_1',
        'image_2',
        'image_3',
        'image_4',
        'price',
        'discount',
        'height',
        'width',
        'handle',
        'base',
    ];

    // Define relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}
