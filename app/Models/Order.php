<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'order_id';

    protected $fillable = ['customer_name', 'phone', 'address', 'order_date', 'status', 'total_amount'];

    protected $casts = ['order_date' => 'date'];

    public function details()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'order_id');
    }
}
