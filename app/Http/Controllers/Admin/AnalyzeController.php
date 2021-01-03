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
        $supplierAlgopixs = $supplierFile->supplierAlgopixs()->paginate(500);
        return view('admin.analyze.view', compact('supplierAlgopixs'));
    }

    public function show(Request $request,SupplierFile $supplierFile, SupplierAlgopix $supplierAlgopix)
    {
        $algopixData = [
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
            'o_market_brand' => 'Brand',
            'o_country_code' => 'Country Code',
            'o_new_market_price_currency' => 'Offers New Market Price',
            'o_new_market_price_amount' => 'Offer New Market Amount',
            'o_new_market_place_fees_currency' => 'Offer New Place Fees Currency',
            'o_new_market_place_fees_amount' => 'Offer New Place Fees Amount',
            'o_new_fba_selling_fees_currency' => 'Offer New Fba Selling Fees Currency',
            'o_new_fba_selling_fees_amount' => 'Offer New Fba Selling Fees Amount',
            'o_new_tax_amount_currency' => 'Offer New Tax Amount Currency',
            'o_new_tax_amount_amount' => 'Offer New Tax Amount',
            'o_new_listing_url' => 'Offer New Listing URL',
            'o_msd_product_title' => 'Offer Market Specific Product Title',
            'o_msd_object_type' => 'Offer Market Specific Object Type',
            'o_msd_estimated_sales_revenues_currency' => 'Offer Market Specific Estimated Sales Revenues',
            'o_msd_estimated_sales_revenues_amount' => 'Offer Market Specific Estimated Sales Revenues Amount',
            'o_msd_estimated_unit_sold' => 'Offer Market Specific Estimated Unit Sold',
            'o_msd_c_level' => 'Offer Market Specific Competition Level',
            'o_msd_c_number_of_offers' => 'Offer Market Specific Competition Number of Offers',
            'o_msd_c_lofrs_price_currency_code' => 'Offer Market Specific Competition Lowest Offer From Reputable Seller Price Currency',
            'o_msd_c_lofrs_price_amount' => 'Offer Market Specific Competition Lowest Offer From Reputable Seller Price Amount',
            'o_msd_c_lofrs_srating_positive_feedback_rating' => 'Offer Market Specific Competition Lowest Offer From Reputable Srating Positive Feedback Rating',
            'o_msd_c_lofrs_srating_number_of_seller_ratings' => 'Offer Market Specific Competition Lowest Offer From Reputable Srating Number Of Seller Ratings',
            'o_msd_c_lowest_offer_price_currency_code' => 'Offer Market Specific Competition Lowest Offer Price Currency',
            'o_msd_c_lowest_offer_price_amount' => 'Offer Market Specific Competition Lowest Offer Price Amount',
            'o_msd_c_lowest_offer_srating_positive_feedback_rating' => 'Offer Market Specific Competition Lowest Offer Srating Positive Feedback Rating',
            'o_msd_c_lowest_offer_srating_number_of_seller_ratings' => 'Offer Market Specific Competition Lowest Offer Srating Number Of Seller Ratings',
            'o_msd_c_buy_box_offering_price_currency_code' => 'Offer Market Specific Competition Buy Box Offering Price Currency Code',
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
        return view('admin.analyze.show', compact('algopixData','supplierAlgopix'));
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
