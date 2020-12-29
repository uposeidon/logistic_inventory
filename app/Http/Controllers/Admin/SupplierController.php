<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
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
        if(!empty($request->input('search')) || !empty($request->input('created_at'))){
            if(!empty($request->input('search')) && !empty($request->input('created_at'))){
                $suppliers = Supplier::
                whereDate('created_at','=',Carbon::parse($request->input('created_at')))
                ->where(function($q) use ($request) {
                    $q->where('x_z_asin','like','%'.$request->input('search').'%')->orWhere('upc','like','%'.$request->input('search').'%');
                })->paginate($page);
            }elseif(!empty($request->input('search'))){
                $suppliers = Supplier::where('x_z_asin','like','%'.$request->input('search').'%')
                ->orWhere('upc','like','%'.$request->input('search').'%')->paginate($page);
            }elseif(!empty($request->input('created_at'))){
                $suppliers = Supplier::whereDate('created_at','=',Carbon::parse($request->input('created_at')))->paginate($page);
            }   
        }else{
            $suppliers = Supplier::paginate($page);
        }
        
        return view('admin.supplier.index', compact('suppliers'));
    }

    public function show(Supplier $supplier)
    {
        return view('admin.supplier.show', compact('supplier'));
    }
}
