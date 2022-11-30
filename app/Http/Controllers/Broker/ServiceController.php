<?php

namespace App\Http\Controllers\Broker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;
use App\User;


class ServiceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    function view(){

        return view('admin.service.service');
    }

    function create(Request $request){

        $validate = $request->validate([
            'icon' => 'required|max:255',
            'title' => 'required|max:255',
            'details' => 'required',
        ]);

        $service = new Service();

        $service->icon = $request->icon;
        $service->title = $request->title;
        $service->details = $request->details;

        $request->user()->service()->save($service);

        return back()->with('success', 'Created successfully!');

    }


    function edit($title){

        $service = Service::where('title', $title)->get();
        return view('admin.service.edit', compact('service'));
    }

    function update(Request $request, $id){

    $service = Service::find($id);

    $service->icon = $request->icon;
    $service->title = $request->title;
    $service->details = $request->details;
    $request->user()->service()->save($service);

    return back()->with('success', 'Created successfully!');
    }

    function destroy($id){

        $service = Service::find($id);
        $service->delete();
        return response()->json([
        'message' => 'Data deleted successfully!'
      ]);
    }

}
