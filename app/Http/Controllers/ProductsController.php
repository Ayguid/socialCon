<?php
namespace App\Http\Controllers;



use App\Models\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Response;
use Session;
use Illuminate\Support\Facades\Storage;
use App\Product;



class ProductsController extends Controller
{
  private $product;



  public function __construct()
  {
    $this->middleware('auth');
  }



  public function index(){
    if (Session::has('user')){
      $user = Session::get('user');
    }else{
      $user = Auth::user();
    }
    return view('products', compact('user'));
  }


  public function addProduct(Request $request)
  {
    $user = Auth::user();
    $product = new Product;
    // $product->price ='200';
    // $product->save();
    // var_dump($product);
    $save = false;
    $model = [
      'user_id' => $user->id,
      'product_name' => $request->input("product_name"),
      'product_description' => $request->input("product_description"),
      'product_category' => $request->input("product_category"),
      'price' => $request->input("price"),
    ];

    $validator = Validator::make($request->all(), [
      'product_name' => 'required|string|max:255',
      'product_description' => 'required|string|max:255',
      'product_category' => 'required|string|max:100',
      'price' => 'required|string|max:10',
    ]);

    if ($validator->fails())
    {
      $save = false;
    }


    else if (!$validator->fails())
    {
        $product->user_id = $user->id;
        $product->product_name = $model['product_name'];
        $product->product_description = $model['product_description'];
        $product->product_category = $model['product_category'];
        $product->price = $model['price'];
        $save =$product->save();
    }


    if ($save)
    {
      $request->session()->flash('alert-success', 'Your product is now in stock!');
      return redirect('products');
    }
    else
    {
      $request->session()->flash('alert-danger', 'Oops there was a problem!');
      return redirect('products')->withErrors($validator);
    }

  }

  public function showProduct($id)
  {
    $product=Product::productData($id);
    return view('productInfo', compact('product'));
  }



}
