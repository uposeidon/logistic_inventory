<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\SupplierAlgopix;
use App\SupplierFile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class AnalyzeController extends Controller
{
    private $algoPixAPIKeyValues = [
        'id' => 'ID',
        'aid'=>'AID',
        'upc' => 'UPC',
        'ean' => 'EAN',
        'asin' => 'ASIN',
        'title' => 'Title',
        'model' => 'Model',
        'color' => 'Color',
        'brand' => 'Brand',
        'image_url' => 'Image',
        'description' => 'Description',
        'item_width' => 'Item Width',
        'item_length' => 'Item Length',
        'item_height' => 'Item Height',
        'item_weight' => 'Item Weight',
        'package_width' => 'Package Width',
        'package_length' => 'Package Length',
        'package_height' => 'Package Height',
        'package_weight' => 'Package Weight',
        'msrp_amount' => 'MSRP Amount',
        'demand' => 'Demand',
        'o_market_brand' => 'Offer Market Brand',
        'o_country_code' => 'Offer Country Code',
        'o_new_market_price_amount' => 'Offer New Market Amount',
        'o_new_market_place_fees_amount' => 'Offer New Place Fees Amount',
        'o_new_fba_selling_fees_amount' => 'Offer New Fba Selling Fees Amount',
        'o_new_tax_amount_amount' => 'Offer New Tax Amount',
        'o_new_listing_url' => 'Offer New Listing URL',
        'o_msd_product_title' => 'Offer Market Specific Product Title',
        'o_msd_object_type' => 'Offer Market Specific Object Type',
        'o_msd_estimated_sales_revenues_amount' => 'Offer Market Specific Estimated Sales Revenues Amount',
        'o_msd_estimated_unit_sold' => 'Offer Market Specific Estimated Unit Sold',
        'o_msd_c_level' => 'Offer Market Specific Competition Level',
        'o_msd_c_number_of_offers' => 'Offer Market Specific Competition Number of Offers',
        'o_msd_c_lofrs_price_amount' => 'Offer Market Specific Competition Lowest Offer From Reputable Seller Price Amount',
        'o_msd_c_lofrs_srating_positive_feedback_rating' => 'Offer Market Specific Competition Lowest Offer From Reputable Srating Positive Feedback Rating',
        'o_msd_c_lofrs_srating_number_of_seller_ratings' => 'Offer Market Specific Competition Lowest Offer From Reputable Srating Number Of Seller Ratings',
        'o_msd_c_lowest_offer_price_amount' => 'Offer Market Specific Competition Lowest Offer Price Amount',
        'o_msd_c_lowest_offer_srating_positive_feedback_rating' => 'Offer Market Specific Competition Lowest Offer Srating Positive Feedback Rating',
        'o_msd_c_lowest_offer_srating_number_of_seller_ratings' => 'Offer Market Specific Competition Lowest Offer Srating Number Of Seller Ratings',
        'o_msd_c_buy_box_offering_price_amount' => 'Offer Market Specific Competition Buy Box Offering Price Amount',
        'o_msd_c_buy_box_offering_srating_positive_feedback_rating' => 'Offer Market Specific Competition Buy Box Offering Srating Positive Feedback Rating',
        'o_msd_c_buy_box_offering_srating_number_of_seller_ratings' => 'Offer Market Specific Competition Buy Box Offering Srating Number Of Seller Ratings',
        'o_msd_c_amazon_offer_state' => 'Offer Market Specific Competition Amazon Offer State',
        'o_msd_local_asin' => 'Offer Market Specific Local ASIN',
        'o_msd_amazon_category_name' => 'Offer Market Specific Amazon Category Name',
        'o_msd_amazon_category_id' => 'Offer Market Specific Amazon Category ID',
        'o_msd_amazon_category_best_seller_ranking' => 'Offer Market Specific Amazon Category Best Seller Ranking',
        'o_msd_solid_via_fba' => 'Offer Market Specific Sold Via Fba',
        'o_msd_number_off_offers_sold_via_fba' => 'Offer Market Specific Number Off Offers Sold Via Fba',
        'o_image_url' => 'Offer Image',
    ];
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
        $monthNames = ['1' => 'January',
        '2' => 'February',
        '3' => 'March',
        '4' => 'April',
        '5' => 'May',
        '6' => 'June',
        '7' => 'July ',
        '8' => 'August',
        '9' => 'September',
        '10' => 'October',
        '11' => 'November',
        '12' => 'December'];
        
        $years = range(2021, 2031);

        $now = Carbon::now();
        $currentMonth = $now->month;
        $currentYear = $now->year;

        if(!empty($request->input('year'))){
            $currentYear = $request->input('year');
        }
        if($request->input('month')){
            $currentMonth = $request->input('month');
        }
        
        $supplierFilesCount = SupplierFile::whereYear('created_at',$currentYear)->whereMonth('created_at',$currentMonth)->count();
        $supplierAlgopixCount = SupplierAlgopix::whereYear('created_at',$currentYear)->whereMonth('created_at',$currentMonth)->count();

        $supplierAlgopixInProgressCount = DB::table('suppliers_files')->where('status','in-progress')->whereYear('created_at',$currentYear)->whereMonth('created_at',$currentMonth)->count();
        
        $page = 500;
        $supplierFiles = SupplierFile::withCount('supplierAlgopixs')
            ->whereYear('created_at',$currentYear)
            ->whereMonth('created_at',$currentMonth)
            ->paginate($page);
        return view('admin.analyze.index', compact('monthNames', 'currentMonth', 'years', 'supplierFilesCount', 'supplierAlgopixCount', 'supplierAlgopixInProgressCount', 'currentYear', 'supplierFiles'));
    }

    public function view(Request $request,SupplierFile $supplierFile)
    {
        $supplierAlgopixs = $supplierFile->supplierAlgopixs()->paginate(500);
        return view('admin.analyze.view', compact('supplierAlgopixs'));
    }

    public function show(Request $request,SupplierFile $supplierFile, SupplierAlgopix $supplierAlgopix)
    {
        $algopixData = $this->algoPixAPIKeyValues;
        return view('admin.analyze.show', compact('algopixData','supplierAlgopix'));
    }

    public function download(SupplierFile $supplierFile)
    {
        return Storage::download('suppliers/'.$supplierFile->file_name);
    }

    public function downloadResult(SupplierFile $supplierFile)
    {
        $fileName = "result_".$supplierFile->file_name;
        $supplierAlgopixs = $supplierFile->supplierAlgopixs;

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = $this->algoPixAPIKeyValues;
        
        $callback = function() use($supplierAlgopixs, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, array_values($columns));
            foreach ($supplierAlgopixs as $supplierAlgopix) {
                foreach ($columns as $key => $val) {
                    // will check with other solution with required result
                    if(in_array($key,['item_width','item_length','item_height','item_weight',
                    'package_width','package_length','package_height','package_weight'])){
                        $singleRow[$val] = $supplierAlgopix->$key. ' '. $supplierAlgopix->{$key.'_unit'};
                    } elseif(in_array($key,['msrp_amount','o_new_market_price_amount',
                    'o_new_market_place_fees_amount','o_new_fba_selling_fees_amount','o_msd_estimated_sales_revenues_amount'])) {
                        $currencyKey = str_replace(['amount'],['currency'],$key);
                        $singleRow[$val] = $supplierAlgopix->$key. ' '. $supplierAlgopix->{$currencyKey};
                    } elseif(in_array($key,['o_new_tax_amount_amount'])){
                        $currencyKey = str_replace(['amount_amount'],['amount_currency'],$key);
                        $singleRow[$val] = $supplierAlgopix->$key. ' '. $supplierAlgopix->{$currencyKey};
                    } elseif(in_array($key,['o_msd_c_lofrs_price_amount','o_msd_c_lowest_offer_price_amount','o_msd_c_buy_box_offering_price_amount'])) {
                        $currencyKey = str_replace(['amount'],['currency_code'],$key);
                        $singleRow[$val] = $supplierAlgopix->$key. ' '. $supplierAlgopix->{$currencyKey};
                    } else {
                        $singleRow[$val] = (string) $supplierAlgopix->$key; 
                    }
                }
                fputcsv($file, $singleRow);
                unset($singleRow);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
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
