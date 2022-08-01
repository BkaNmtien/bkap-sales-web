<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function orderDetail(){
        return $this->hasMany(related:OrderDetail::class, foreignKey:'order_id', localKey:'id');
    }

    public function user(){
        return $this->belongsTo(related:User::class, foreignKey:'user_id', ownerKey:'id');
    }
}
