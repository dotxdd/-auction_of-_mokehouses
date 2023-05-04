<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_image',
        'product_color',
        'product_company',
        'product_model',
        'product_start_price',
        'product_currency_price',
        'product_current_price',
        'product_year_of_production',
        'product_id'
    ];
   // protected $primaryKey = 'product_id';
    public function company()
    {
        return $this->belongsTo(ProductCompany::class, 'product_company');
    }
}
