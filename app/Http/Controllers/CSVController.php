<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CSVController extends Controller
{
    public function create()
    {
        return view('csv.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'csv' => 'required|mimes:csv,txt',
        ]); 
        
        if($validator->fails()) {
            return redirect()->route('user.csv.create')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $file = $request->file('csv');
        $records = array_map('str_getcsv',file($file));
        unset($records[0]);
       
        foreach ($records as $key => $record) {
            $upc = empty(trim($record['4'])) ? null : $record['4'];
            $data[] = [
                    'seller' => $record['0'],
                    'listing_id' => $record['1'],
                    'description' => utf8_encode($record['2']),
                    'x_z_asin' => $record['3'],
                    'upc' => $upc,
                    'boo_asin' => $record['5'],
                    'quantity' => $record['6'],
                    'msrp' => $record['7'],
                    'ext_msrp' => $record['8'],
                    'package_id' => $record['9'],
                    'warehouse' => $record['10'],
    
            ];
        }
        $arrayData = array_chunk($data,500);
        foreach($arrayData as $insertionData){
            Supplier::insert($insertionData);
        }
        return redirect()->route('user.csv.create')->with('success', 'File Uploaded and Processed Successfully!');
    }
}
