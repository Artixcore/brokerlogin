<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\FromCompany;
use App\User;
use Image;

class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    function home(){
        if(Auth::user()->urole=='admin'){
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('broker.dashboard');
        }
    }

    public function adminprofile($name){
        $users = User::where('name', $name)->get();
        return view('admin.profile.profile', compact('users'));
    }

    function brokerprofile($name){
        $users = User::where('name', $name)->get();
        return view('broker.profile.profile', compact('users'));
    }


    function update_avatar(Request $request){
        // User Upload Avatar
        if($request->hasFile('avatar')){
            $avatar =   $request->file('avatar');
            $filename = time() . '.' .$avatar->getClientOriginalExtension();
            Image::make($avatar)->save( public_path('/user/'. $filename) );
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        return back();
    }

    function status(Request $request){
        $user = User::find($request->user_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success' => 'Status Successfully Update']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        dd('Password change successfully.');
    }

}
