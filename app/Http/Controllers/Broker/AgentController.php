<?php

namespace App\Http\Controllers\Broker;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Image;

class AgentController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function agent(){
        return view('broker.agent.agent');
    }

    function post(Request $request){

        if($request->hasFile('avatar')){
            $avatar =   $request->file('avatar');
            $filename = time() . '.' .$avatar->getClientOriginalExtension();
            Image::make($avatar)->save( public_path('/user/'. $filename) );
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        //
    }

    if($request->file('docs'))
    {
        $pdf = $request->file('docs');
        $pdfname = time() . '.' . $request->file('docs')->extension();
        $pdfPath = public_path() . '/pdfs/uploads/';
        $pdf->move($pdfPath, $pdfname);
    }


        $user = new User;

        // $user->avatar = $filename;
        $user->name = $request->name;
        $user->f_name = $request->f_name;
        $user->l_name = $request->l_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->beginning = $request->beginning;
        $user->docs = $pdfname;
        $user->urole = $request->urole;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->back();

    }
}
