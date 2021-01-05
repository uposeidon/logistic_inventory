@extends('layouts.admin')
@section('content')
<div class="my-3 p-3 bg-white rounded box-shadow">
   <h6 class="border-bottom border-gray p-3 ">{{ __('Analyze Data') }}<span class="float-right"><a href="{{ route('admin.analyze.view',[$supplierAlgopix->suppliers_files_id]) }}">Back</a></h6>
   <div class="table-responsive">
      <table class="table table-bordered">
         <tbody>
            <tr>
              <td>{{ $algopixData['id'] }}</td>
              <td>{{ $supplierAlgopix->id }}</td>
            </tr>
            <tr>
              <td>{{ $algopixData['aid'] }}</td>
              <td>{{ $supplierAlgopix->aid }}</td>
            </tr>
            <tr>
              <td>{{ $algopixData['upc'] }}</td>
              <td>{{ $supplierAlgopix->upc }}</td>
            </tr>
            <tr>
              <td>{{ $algopixData['ean'] }}</td>
              <td>{{ $supplierAlgopix->ean }}</td>
            </tr>
            <tr>
              <td>{{ $algopixData['asin'] }}</td>
              <td>{{ $supplierAlgopix->asin }}</td>
            </tr>
            <tr>
              <td>{{ $algopixData['title'] }}</td>
              <td>{{ $supplierAlgopix->title }}</td>
            </tr>
            <tr>
              <td>{{ $algopixData['model'] }}</td>
              <td>{{ $supplierAlgopix->model }}</td>
            </tr>
            <tr>
              <td>{{ $algopixData['color'] }}</td>
              <td>{{ $supplierAlgopix->color }}</td>
            </tr>
            <tr>
              <td>{{$algopixData['brand']}}</td>
              <td>{{ $supplierAlgopix->brand }}</td>
            </tr>
            <tr>
              <td>{{$algopixData['image_url']}}</td>
              <td>{{ $supplierAlgopix->image_url }}</td>
            </tr>
            <tr>
              <td>{{$algopixData['description']}}</td>
              <td>{{ $supplierAlgopix->description }}</td>
            </tr>
            <tr>
              <td>{{$algopixData['item_width']}}</td>
              <td>{{ $supplierAlgopix->item_width }} {{ $supplierAlgopix->item_width_unit }}</td>
            </tr>
            <tr>
              <td>{{$algopixData['item_length']}}</td>
              <td>{{ $supplierAlgopix->item_length }} {{ $supplierAlgopix->item_length_unit }}</td>
            </tr>
            <tr>
              <td>{{$algopixData['item_height']}}</td>
              <td>{{ $supplierAlgopix->item_height }} {{ $supplierAlgopix->item_height_unit }}</td>
            </tr>
            <tr>
              <td>{{$algopixData['item_weight']}}</td>
              <td>{{ $supplierAlgopix->item_weight }} {{ $supplierAlgopix->item_weight_unit }}</td>
            </tr>
            <tr>
              <td>{{$algopixData['package_width']}}</td>
              <td>{{ $supplierAlgopix->package_width }} {{ $supplierAlgopix->package_width_unit }}</td>
            </tr>
            <tr>
              <td>{{$algopixData['package_length']}}</td>
              <td>{{ $supplierAlgopix->package_length }} {{ $supplierAlgopix->package_length_unit }}</td>
            </tr>
            <tr>
              <td>{{$algopixData['package_height']}}</td>
              <td>{{ $supplierAlgopix->package_height }} {{ $supplierAlgopix->package_height_unit }}</td>
            </tr>
            <tr>
              <td>{{$algopixData['package_weight']}}</td>
              <td>{{ $supplierAlgopix->package_weight }} {{ $supplierAlgopix->package_weight_unit }}</td>
            </tr>
            <tr>
              <td>{{$algopixData['msrp_amount']}}</td>
              <td>{{ $supplierAlgopix->msrp_amount }} {{ $supplierAlgopix->msrp_currency }}</td>
            </tr>
            <tr>
              <td>{{$algopixData['demand']}}</td>
              <td>{{ $supplierAlgopix->demand }}</td>
            </tr>
            <tr>
              <td>{{$algopixData['o_market_brand']}}</td>
              <td>{{ $supplierAlgopix->o_market_brand }}</td>
            </tr>
            <tr>
              <td>{{$algopixData['o_country_code']}}</td>
              <td>{{ $supplierAlgopix->o_country_code }}</td>
            </tr>
            <tr>
              <td>{{$algopixData['o_new_market_price_amount']}}</td>
              <td>{{ $supplierAlgopix->o_new_market_price_amount }} {{$supplierAlgopix->o_new_market_price_currency}}</td>
            </tr>
            <tr>
              <td>{{$algopixData['o_new_market_place_fees_amount']}}</td>
              <td>{{ $supplierAlgopix->o_new_market_place_fees_amount }} {{$supplierAlgopix->o_new_market_place_fees_currency}}</td>
            </tr>
            <tr>
              <td>{{$algopixData['o_new_fba_selling_fees_amount']}}</td>
              <td>{{ $supplierAlgopix->o_new_fba_selling_fees_amount }} {{$supplierAlgopix->o_new_fba_selling_fees_currency}}</td>
            </tr>
            <tr>
              <td>{{$algopixData['o_new_tax_amount_amount']}}</td>
              <td>{{ $supplierAlgopix->o_new_tax_amount_amount }} {{$supplierAlgopix->o_new_tax_amount_currency}}</td>
            </tr>
            <tr>
              <td>{{$algopixData['o_new_listing_url']}}</td>
              <td><a href="{{ $supplierAlgopix->o_new_listing_url }}" target="_blank" >{{ $supplierAlgopix->o_new_listing_url }}</a></td>
            </tr>
            <tr>
              <td>{{$algopixData['o_msd_product_title']}}</td>
              <td>{{ $supplierAlgopix->o_msd_product_title }}</td>
            </tr>
            <tr>
              <td>{{$algopixData['o_msd_object_type']}}</td>
              <td>{{ $supplierAlgopix->o_msd_object_type }}</td>
            </tr>
            <tr>
              <td>{{$algopixData['o_msd_estimated_sales_revenues_amount']}}</td>
              <td>{{ $supplierAlgopix->o_msd_estimated_sales_revenues_amount }} {{$supplierAlgopix->o_msd_estimated_sales_revenues_currency}}</td>
            </tr>
            <tr>
              <td>{{$algopixData['o_msd_estimated_unit_sold']}}</td>
              <td>{{ $supplierAlgopix->o_msd_estimated_unit_sold }}</td>
            </tr>
            <tr>
              <td>{{$algopixData['o_msd_c_level']}}</td>
              <td>{{ $supplierAlgopix->o_msd_c_level }}</td>
            </tr>
            <tr>
              <td>{{$algopixData['o_msd_c_number_of_offers']}}</td>
              <td>{{ $supplierAlgopix->o_msd_c_number_of_offers }}</td>
            </tr>

            <tr>
              <td>{{$algopixData['o_msd_c_lofrs_price_amount']}}</td>
              <td>{{ $supplierAlgopix->o_msd_c_lofrs_price_amount }}{{ $supplierAlgopix->o_msd_c_lofrs_price_currency_code }}</td>
            </tr>
            <tr>
              <td>{{$algopixData['o_msd_c_lofrs_srating_positive_feedback_rating']}}</td>
              <td>{{ $supplierAlgopix->o_msd_c_lofrs_srating_positive_feedback_rating }}</td>
            </tr>
            <tr>
              <td>{{$algopixData['o_msd_c_lofrs_srating_number_of_seller_ratings']}}</td>
              <td>{{ $supplierAlgopix->o_msd_c_lofrs_srating_number_of_seller_ratings }}</td>
            </tr>

            <tr>
              <td>{{$algopixData['o_msd_c_lowest_offer_price_amount']}}</td>
              <td>{{ $supplierAlgopix->o_msd_c_lowest_offer_price_amount }} {{ $supplierAlgopix->o_msd_c_lowest_offer_price_currency_code }}</td>
            </tr>
            <tr>
              <td>{{$algopixData['o_msd_c_lowest_offer_srating_positive_feedback_rating']}}</td>
              <td>{{ $supplierAlgopix->o_msd_c_lowest_offer_srating_positive_feedback_rating }}</td>
            </tr>
            <tr>
              <td>{{$algopixData['o_msd_c_lowest_offer_srating_number_of_seller_ratings']}}</td>
              <td>{{ $supplierAlgopix->o_msd_c_lowest_offer_srating_number_of_seller_ratings }}</td>
            </tr>
            <tr>
              <td>{{$algopixData['o_msd_c_buy_box_offering_price_amount']}}</td>
              <td>{{ $supplierAlgopix->o_msd_c_buy_box_offering_price_amount }} {{$supplierAlgopix->o_msd_c_buy_box_offering_price_currency_code}}</td>
            </tr>
            <tr>
              <td>{{$algopixData['o_msd_c_buy_box_offering_srating_positive_feedback_rating']}}</td>
              <td>{{ $supplierAlgopix->o_msd_c_buy_box_offering_srating_positive_feedback_rating }}</td>
            </tr>
            <tr>
              <td>{{$algopixData['o_msd_c_buy_box_offering_srating_number_of_seller_ratings']}}</td>
              <td>{{ $supplierAlgopix->o_msd_c_buy_box_offering_srating_number_of_seller_ratings }}</td>
            </tr>

            <tr>
              <td>{{$algopixData['o_msd_c_amazon_offer_state']}}</td>
              <td>{{ $supplierAlgopix->o_msd_c_amazon_offer_state }}</td>
            </tr>
            <tr>
              <td>{{$algopixData['o_msd_local_asin']}}</td>
              <td>{{ $supplierAlgopix->o_msd_local_asin }}</td>
            </tr>
            <tr>
              <td>{{$algopixData['o_msd_amazon_category_name']}}</td>
              <td>{{ $supplierAlgopix->o_msd_amazon_category_name }}</td>
            </tr>
            <tr>
              <td>{{$algopixData['o_msd_amazon_category_id']}}</td>
              <td>{{ $supplierAlgopix->o_msd_amazon_category_id }}</td>
            </tr>
            <tr>
              <td>{{$algopixData['o_msd_amazon_category_best_seller_ranking']}}</td>
              <td>{{ $supplierAlgopix->o_msd_amazon_category_best_seller_ranking }}</td>
            </tr>
            <tr>
              <td>{{$algopixData['o_msd_solid_via_fba']}}</td>
              <td>{{ $supplierAlgopix->o_msd_solid_via_fba }}</td>
            </tr>
            <tr>
              <td>{{$algopixData['o_msd_number_off_offers_sold_via_fba']}}</td>
              <td>{{ $supplierAlgopix->o_msd_number_off_offers_sold_via_fba }}</td>
            </tr>
            <tr>
              <td>{{$algopixData['o_image_url']}}</td>
              <td><img class="img-fluid" src="{{ $supplierAlgopix->o_image_url }}" /></td>
            </tr>
          </tbody>
      </table>
   </div>
@endsection
<style>
.img-fluid { width: 200px; height: 200px; }
</style>


