<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Supplier;
use Illuminate\Http\Request;

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

    public function index()
    {
        $suppliers = Supplier::paginate(100);
        return view('admin.supplier.index', compact('suppliers'));
    }

    public function show(Supplier $supplier)
    {
        return view('admin.supplier.show', compact('supplier'));
    }
}
