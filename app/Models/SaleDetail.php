<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    use HasFactory;
    protected $fillable = ['saleId', 'productId', 'qty', 'subPrice'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'productId', 'id');
    }
}
