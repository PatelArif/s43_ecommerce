<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // You can define fillable or guarded properties here if needed
    protected $fillable = ['name', 'image'];
}
