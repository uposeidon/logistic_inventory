<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\SuppliersFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $suppliersFiles = SuppliersFiles::paginate($page);
        return view('admin.analyze.index', compact('suppliersFiles'));
    }

    public function download(Request $request,$id)
    {
        $suppliersFile = SuppliersFiles::findOrFail($id);
        return Storage::download('suppliers/'.$suppliersFile->file_name);
    }
}
