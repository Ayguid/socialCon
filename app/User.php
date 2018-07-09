<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Product;
class User extends Authenticatable
{
  use Notifiable;

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'first_name','last_name', 'email', 'birthday', 'age', 'sex', 'password',
  ];

  /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
  protected $hidden = [
    'password', 'remember_token',
  ];


  public function getProducts()
  {
    return  $this->hasMany('App\Product')->orderBy('created_at','desc');
  }










  


  public function getPhoto(){
    if (!empty($this->profile_pic)){
      $path = 'storage/uploads/profile_photos/'.$this->profile_pic;
    }
    else
    {
      $path = "images/profile.png";
    }
    return url('/'.$path);
  }

}
