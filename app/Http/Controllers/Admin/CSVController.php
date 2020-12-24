<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CSVController extends Controller
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
    
    public function create()
    {
        return view('admin.csv.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'csv' => 'required|mimes:csv,txt',
        ]); 
        
        if($validator->fails()) {
            return redirect()->route('admin.csv.create')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $file = $request->file('csv');
        $records = array_map('str_getcsv',file($file));
        unset($records[0]);
       
        foreach ($records as $key => $record) {
            $upc = empty(trim($record['4'])) ? null : $record['4'];
            $data[] = [
                'x_z_asin' => $record['3'],
                'seller' => $record['0'],
                'listing_id' => $record['1'],
                'description' => utf8_encode($record['2']),
                'upc' => $upc,
                'boo_asin' => $record['5'],
                'quantity' => $record['6'],
                'msrp' => $record['7'],
                'ext_msrp' => $record['8'],
                'package_id' => $record['9'],
                'warehouse' => $record['10'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
    
            ];
        }
        $arrayData = array_chunk($data,500);
        foreach($arrayData as $insertionData){
            Supplier::insertOrIgnore($insertionData);
        }
        return redirect()->route('admin.csv.create')->with('success', 'File Uploaded and Processed Successfully!');
    }
}