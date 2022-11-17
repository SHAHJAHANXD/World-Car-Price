<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = ['Body_type', 'Transmission_type', 'Drive_type', 'Fule_type', 'Capacities', 'Doors', 'Category',    'Brand',    'top_10',    'Tags', 'Product_status',    'Title',    'Year',    'Thumbnail_Image',    'Multiple_images', 'Image_alt', 'Short_Description', 'Long_Description',    'Price', 'Country'];
}
