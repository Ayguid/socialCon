<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Foundation\Auth\User;


class Product extends Model
{
    //
    protected $table = 'products';


    protected $fillable = [
      'id','user_id', 'product_name', 'product_description', 'product_category', 'price',
    ];



      public static function productData($id)
      {
        $productData = Product::all()->where('id', $id);
        return $productData;
      }

}
