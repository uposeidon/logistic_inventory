<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\SupplierAlgopix;
use App\SupplierFile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AnalyzeController extends Controller
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

    public function index(Request $request)
    {
        $page = 500;
        $supplierFiles = SupplierFile::paginate($page);
        return view('admin.analyze.index', compact('supplierFiles'));
    }

    public function view(Request $request,SupplierFile $supplierFile)
    {
        dd('working on');
        //Analyze Data for specific file (need to attached the supplierFile ID and supplier ID)
        $page = 500;
        $supplierAlgopixs = SupplierAlgopix::paginate($page);
        return view('admin.analyze.view', compact('supplierAlgopixs'));
    }

    public function download(SupplierFile $supplierFile)
    {
        return Storage::download('suppliers/'.$supplierFile->file_name);
    }

    public function update(SupplierFile $supplierFile, Request $request)
    { 
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:new,in-progress',
        ]); 
        
        if($validator->fails()) {
            return redirect()->route('admin.analyze.index')
                        ->withErrors($validator)
                        ->withInput();
        }
        if($request->input('status') == 'new'){
            $supplierFile->status = 'in-progress';
            $supplierFile->progress_at = Carbon::now();
        }else if($request->input('status') == 'in-progress'){
            $supplierFile->status = 'cancelled';
        }
        $supplierFile->updated_at = Carbon::now();
        $supplierFile->save();
        return redirect()->route('admin.analyze.index')->with('success', 'Status Updated Successfully!');
    }
}
