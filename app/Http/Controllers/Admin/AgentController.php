<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Exports\UsersExport;

use Illuminate\Http\Request;
use App\Fremdvertrag;
use App\Application;
use Carbon\Carbon;
use App\Customer;
use App\OExpanse;
use App\UserDoc;
use App\Expanse;
use App\AppDoc;
use App\FixPay;
use App\User;
use App\AHV;
use App\ALV;
use App\KTG;
use App\NBU;
use App\Risiko;
use App\Spesen;
use Image;
use PDF;

class AgentController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function fileExport()
    {
        return Excel::download(new UsersExport, 'users-collection.xlsx');
    }

    function agent(){
        return view('admin.agent.agent');
    }

    function post(Request $request){


    if($request->file('avatar'))
    {
        $ava = $request->file('avatar');
        $avatar = time() . '.' . $request->file('avatar')->extension();
        $avatarPath = public_path() . '/user/';
        $ava->move($avatarPath, $avatar);
    }

        $user = new User;

        $user->avatar = $avatar;
        $user->name = $request->name;
        $user->f_name = $request->f_name;
        $user->l_name = $request->l_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->beginning = $request->beginning;
        $user->age = $request->age;
        $user->urole = $request->urole;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->back()->with('success', 'Gespeichert');

    }

    function UpdateJerk(Request $request){
        $ids = $request->ids;
        Application::whereIn('id', $ids)->update();
        return response()->json(['success',"Updated!"]);
    }


    function taxes(){

    $ahv = AHV::all();
    $alv = ALV::all();
    $nbu = NBU::all();
    $ktg = KTG::all();
    $risiko = Risiko::all();
    return view('admin.agent.tax', compact('ahv', 'alv', 'nbu', 'ktg','risiko'));

    }

    function taxes_risiko(Request $request){

        $risiko = new Risiko;
        $risiko->name = $request->name;
        $risiko->amount = $request->amount;
        $risiko->save();

        return redirect()->back();
    }

    function taxes_risiko_update(Request $request, $id){
        $risiko = Risiko::find($id);
        $risiko->name = $request->name;
        $risiko->amount = $request->amount;
        $risiko->save();

        return redirect()->back();
    }

    function taxes_ahv(Request $request){

        $ahv = new AHV;
        $ahv->name = $request->name;
        $ahv->amount = $request->amount;
        $ahv->save();

        return redirect()->back();
    }

    function taxes_ahv_update(Request $request, $id){

        $ahv = AHV::find($id);
        $ahv->name = $request->name;
        $ahv->amount = $request->amount;
        $ahv->save();

        return redirect()->back();
    }

    function taxes_alv(Request $request){

        $ahv = new ALV;
        $ahv->name = $request->name;
        $ahv->amount = $request->amount;
        $ahv->save();

        return redirect()->back();
    }

    function taxes_alv_update(Request $request, $id){

        $ahv = ALV::find($id);
        $ahv->name = $request->name;
        $ahv->amount = $request->amount;
        $ahv->save();

        return redirect()->back();
    }

    function taxes_nbus(Request $request){

        $ahv = new NBU;
        $ahv->name = $request->name;
        $ahv->amount = $request->amount;
        $ahv->save();

        return redirect()->back();
    }

    function taxes_nbus_update(Request $request, $id){

        $ahv = NBU::find($id);
        $ahv->name = $request->name;
        $ahv->amount = $request->amount;
        $ahv->save();

        return redirect()->back();
    }

    function taxes_ktgs(Request $request){

        $ahv = new KTG;
        $ahv->name = $request->name;
        $ahv->amount = $request->amount;
        $ahv->save();

        return redirect()->back();
    }

    function taxes_ktgs_update(Request $request, $id){

        $ahv = KTG::find($id);
        $ahv->name = $request->name;
        $ahv->amount = $request->amount;
        $ahv->save();

        return redirect()->back();
    }

    function agent_doc(Request $request){

        $user = new UserDoc;

        $user->doc_number = 'doc:'.uniqid();
        $user->user_id = $request->user_id;
        $user->name = $request->name;
        $user->document = $request->document;

        $user->save();

        return redirect()->back();

    }


    function single($name){
        $agent = User::where('name', $name)->get();
        return view('admin.agent.single', compact('agent'));
    }

    function update($name){
        $agent = User::where('name', $name)->get();
        return view('admin.agent.update', compact('agent'));
    }

    function update_user(Request $request, $id){

            $user = User::find($id);

            $user->f_name = $request->f_name;
            $user->l_name = $request->l_name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->gender = $request->gender;
            $user->beginning = $request->beginning;
            $user->save();

            return redirect()->back();

        }

        function update_avatar(Request $request, $id){

            if($request->file('avatar'))
            {
                $ava = $request->file('avatar');
                $avatar = time() . '.' . $request->file('avatar')->extension();
                $avatarPath = public_path() . '/user/';
                $ava->move($avatarPath, $avatar);
            }

            $user = User::find($id);
            $user->avatar = $avatar;
            $user->save();

            return redirect()->back();

        }


        function update_files(Request $request, $id){

            if($request->file('docs'))
            {
                $pdf = $request->file('docs');
                $pdfname = time() . '.' . $request->file('docs')->extension();
                $pdfPath = public_path() . '/pdfs/uploads/';
                $pdf->move($pdfPath, $pdfname);
            }

            $user = User::find($id);
            $user->docs = $pdfname;
            $user->save();

            return redirect()->back();

        }

        // expance

        function e_page($user_id){
            $exp = Expanse::where('user_id', $user_id)->get();
            $agent = User::where('id', $user_id)->get();
            return view('admin.agent.expanse', compact('exp', 'agent'));
        }

        function e_page_delete($id){
            $form = Spesen::find($id);
            $form->delete();
            return redirect()->back();
        }

        function expanse(Request $request){
            $ex = new Expanse;
            $ex->e_number = 'E'. uniqid();
            $ex->user_id = $request->user_id;
            $ex->e_name = $request->e_name;
            $ex->e_amount = $request->e_amount;
            $ex->e_details = $request->e_details;
            $ex->e_ref = $request->e_ref;
            $ex->save();
            return redirect()->back();
        }

        function e_page_edit($user_id){
            $exper = Expanse::where('user_id', $user_id)->get();
            return view('admin.agent.editexpanse', compact('exper'));
        }

        function expanse_update(Request $request, $id){
            $ex = Expanse::find($id);
            $ex->e_number = $request->e_number;
            $ex->user_id = $request->user_id;
            $ex->e_name = $request->e_name;
            $ex->e_amount = $request->e_amount;
            $ex->e_details = $request->e_details;
            $ex->e_ref = $request->e_ref;
            $ex->save();
            return redirect()->route('admin.agent');
        }

        function delete_expanse($id){
            $form = Expanse::find($id);
            $form->delete();
            return redirect()->back();
        }


        // Application
        function application($user_id){
            $form = Fremdvertrag::where('user_id', $user_id)->get();
            $apps = Application::where('user_id', $user_id)->get();
            $docs = AppDoc::where('user_id', $user_id)->get();
            $agent= User::where('id', $user_id)->get();
            return view('admin.agent.application', compact('apps', 'agent', 'docs', 'form'));
        }


        function oexpanse(Request $request){

            $expa = new OExpanse();

            $expa->eo_number = 'E'. uniqid();
            $expa->eo_name = $request->eo_name;
            $expa->eo_amount = $request->eo_amount;
            $expa->eo_ref = $request->eo_ref;
            $expa->eo_details = $request->eo_details;

            $expa->save();

            return redirect()->back();

        }

        function del_oexpanse($id){
            $form = OExpanse::find($id);
            $form->delete();
            return redirect()->back();
        }

        function agent_contact($user_id){
            $customer = Customer::where('user_id', $user_id)->get();
            $agent = User::where('id', $user_id)->get();
            return view('admin.agent.contact', compact('customer', 'agent'));
        }

        function date_fil(Request $request){
            $start = Carbon::parse($request->created_at);
            $end   = Carbon::parse($request->created_at);

            $apps = Application::whereDate('date','<=',$end->format('m-d-y'))
            ->whereDate('date','>=',$start->format('m-d-y'));

            return view('admin.agent.total', compact('apps'));
        }


        function total($user_id){
            $agent= User::where('id', $user_id)->get();
            return view('admin.agent.total', compact('agent'));
        }

        function grand_total($user_id){
            $agent= User::where('id', $user_id)->get();
            return view('admin.agent.totalm', compact('agent'));
        }

        function total_ex($user_id){
            $agent= User::where('id', $user_id)->get();
            return view('admin.agent.exam', compact('agent'));
        }

        function ext_pay(Request $request){

            $pay = new FixPay();
            $pay->user_id = $request->user_id;
            $pay->p_number = "p:".uniqid();
            $pay->application_number = $request->application_number;
            $pay->name = $request->name;
            $pay->amount = $request->amount;
            $pay->ref = $request->ref;
            $pay->save();

            return redirect()->back();

        }

        function spasen(Request $request){
            $spam = new Spesen;
            $spam->user_id = $request->user_id;
            $spam->name = $request->name;
            $spam->amount = $request->amount;
            $spam->save();
            return redirect()->back();
        }


}
