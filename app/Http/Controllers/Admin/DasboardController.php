<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Application;
use App\AppDoc;
use Facade\FlareClient\Stacktrace\File as StacktraceFile;
use ZipArchive;
use File;

class DasboardController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function view_dashboard(){

        return view('admin.dashboard.dashboard');
    }



    function backup(){

    $zip = new ZipArchive;
    $filedoc = 'docs.zip';
    if($zip->open(public_path($filedoc), ZipArchive::CREATE)==true)
    {
        $files = File::files(public_path('pdfs/uploads'));
        foreach($files as $key=> $value){
            $relativeName = basename($value);
            $zip->addFile($value, $relativeName);
        }
        $zip->close();
    }
    return response()->download(public_path($filedoc));
    }
}
