<?php
namespace App\Http\Controllers;



use App\Models\User;
use Auth;
use DB;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Response;
use Session;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
  private $user;
  private $my_profile = false;


  public function __construct()
  {
    $this->middleware('auth');
  }



  public function index(){
    if (Session::has('id')){
      $id = Session::get('id');
    }else{
      $id = Auth::user();
    }
    return view('profile', compact('user'));
  }




  public function uploadProfilePhoto(Request $request){
    $messages = [
      'image.required' => trans('validation.required'),
      'image.mimes' => trans('validation.mimes'),
      'image.max.file' => trans('validation.max.file'),
    ];
    $validator = Validator::make(array('image' => $request->file('image')), [
      'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048'
    ], $messages);

    if ($validator->fails())
    {
      $response['code'] = 400;
      $response['message'] = implode(' ', $validator->errors()->all());
      return view('profile')->with('response' ,$response['code']);
    }
    else
    {
      $user = Auth::user();
      $file = $request->file('image');
      $file_name = md5(uniqid() . time()) . '.' . $file->getClientOriginalExtension();

      if (!$validator->fails())
      {
        if($user->profile_pic!=null){

          Storage::delete('public/uploads/profile_photos/'.$user->profile_pic);
        }

        $file->storeAs('public/uploads/profile_photos', $file_name);
        $response['code'] = 200;
        $user->profile_pic =$file_name;
        $user->save();

      }
      return Response::json($response);
    }
  }



}
