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
      'name' => $request->input("name"),
      'lname' => $request->input("lname"),
      'email' => $request->input("email"),
      'age' => $request->input("age"),
      'password' => 'required|string|min:6',
      'previous_pass' => 'required|string|min:6|confirmed'
    ];

    $validator = Validator::make($request->all(), [
      'name' => 'required|max:191',
      'lname' => 'required|max:191',
      'email' => 'required|email|max:191|unique:users,email,' . Auth::user()->id,
      'age' => 'required|max:3',
    ]);

    if ($validator->fails())
    {
      $save = false;
    }


    else
    {
      if(Hash::check($request->input("previous_pass"), Auth::user()->password))
      {
        Auth::user()->name = $user['name'];
        Auth::user()->lname = $user['lname'];
        Auth::user()->email = $user['email'];
        Auth::user()->age = $user['age'];
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
