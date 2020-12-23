<?php

namespace App\Http\Controllers;

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
        return view('supplier.index', compact('suppliers'));
    }

    public function show(Supplier $supplier)
    {
        return view('supplier.show', compact('supplier'));
    }
}
