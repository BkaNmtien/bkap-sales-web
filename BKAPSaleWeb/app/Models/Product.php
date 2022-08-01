<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function brand(){
        return $this->belongsTo(related:Brand::class, foreignKey:'brand_id', ownerKey:'id');
    }

    public function category(){
        return $this->belongsTo(related:Category::class, foreignKey:'category_id', ownerKey:'id');
    }

    public function orderDetail(){
        return $this->belongsTo(related:OrderDetail::class, foreignKey:'order_detail_id', ownerKey:'id');
    }

    public function productDetails(){
        return $this->hasMany(related:ProductDetail::class, foreignKey:'product_id', localKey:'id');
    }
}
 