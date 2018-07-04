<?php
namespace App\Http\Controllers;


use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\User;

class SettingsController extends Controller
{

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
    return view('settings', compact('user'));
  }



  public function update(Request $request){
    $save = false;
    $user = [
      'first_name' => $request->input("first_name"),
      'last_name' => $request->input("last_name"),
      'email' => $request->input("email"),
      'birthday' => $request->input("birthday"),
      'sex' => $request->input("sex"),
      'password' => 'required|string|min:6',
      'previous_pass' => 'required|string|min:6|confirmed'
    ];

    $validator = Validator::make($request->all(), [
      'first_name' => 'required|string|max:255',
      'last_name' => 'required|string|max:255',
      'email' => 'required|email|max:191|unique:users,email,' . Auth::user()->id,
      'birthday' => 'required|string|max:100',
      'sex' => 'required|string|max:10',
    ]);

    if ($validator->fails())
    {
      $save = false;
    }


    else
    {
      if(Hash::check($request->input("previous_pass"), Auth::user()->password))
      {
        Auth::user()->first_name = $user['first_name'];
        Auth::user()->last_name = $user['last_name'];
        Auth::user()->email = $user['email'];
        Auth::user()->birthday = $user['birthday'];
        Auth::user()->sex = $user['sex'];
        Auth::user()->password = Hash::make($request->input("password"));
        $save = Auth::user()->save();
      }
    }


    if ($save)
    {
      $request->session()->flash('alert-success', 'Your data was succesfully updated!');
      return redirect('settings');
    }
    else
    {
      $request->session()->flash('alert-danger', 'Oops there was a problem!');
      return redirect('settings')->withErrors($validator);
    }
  }

}
