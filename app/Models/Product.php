<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
    'name', 
    'description',
    'price',
    'view',
    'is_active',
    'category_id',
    'image',
    ];
    public $attributes = [
        'is_active' => '0',
    ];
}
