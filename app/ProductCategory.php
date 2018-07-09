<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
  protected $table = 'product_categories';

  protected $fillable = ['category'];

  protected $primaryKey ='product_category_id';




  public function products()
  {
    return $this->belongsToMany(Product::class);
  }




  public static function getCategories()
{
  $categories = ProductCategory::select('category','product_category_id')->get();
  return $categories;
}






}
