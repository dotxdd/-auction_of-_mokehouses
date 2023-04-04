<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCompany extends Model
{
    protected $primaryKey = 'company_id';
    protected $fillable = ['company_name', 'email', 'phone', 'tax_payer_number'];
}
