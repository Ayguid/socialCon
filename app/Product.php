<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use App\ProductCategory;

class Product extends Model
{
    //
    protected $table = 'products';


    protected $fillable = [
      'id','user_id', 'product_name', 'product_description', 'product_category', 'price',
    ];



    public function user()
    {
      return $this->belongsTo('App\User');
    }


    public function getCategory()
    {
      return $this->hasOne(ProductCategory::class, 'product_category_id', 'product_category');
    }


}
