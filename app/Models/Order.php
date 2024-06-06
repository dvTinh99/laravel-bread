<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'gender', 'email', 'address', 'phone', 'note', 'payment_method'];

    public function order_detail() {
        return $this->hasMany(OrderDetail::class);
    }
}
