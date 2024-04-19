<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = ['userId', 'customerId', 'totalPrice', 'date'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customerId', 'id');
    }
}