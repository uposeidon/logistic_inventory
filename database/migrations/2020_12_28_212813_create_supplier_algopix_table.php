<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierAlgopixTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_algopix', function (Blueprint $table) {
            $table->id();

            $table->string('aid');
            $table->bigInteger('upc')->nullable();
            $table->bigInteger('ean')->nullable();
            $table->string('asin')->nullable();
            $table->string('title')->nullable();

            $table->string('model')->nullable();
            $table->string('color')->nullable();
            $table->string('brand')->nullable();

            $table->text('image_url')->nullable();
            $table->longText('description')->nullable();
            
            //Length,Height,Width Unit is INCH, CM
            //Weight Unit is OUNCE, POUND 

            $table->float('item_width')->nullable();
            $table->enum('item_width_unit',['INCH', 'CM'])->nullable();
            $table->float('item_length')->nullable();
            $table->enum('item_length_unit',['INCH', 'CM'])->nullable();
            $table->float('item_height')->nullable();
            $table->enum('item_height_unit',['INCH', 'CM'])->nullable();
            $table->float('item_weight')->nullable();
            $table->enum('item_weight_unit',['OUNCE', 'POUND'])->nullable();

            $table->float('package_width')->nullable();
            $table->enum('package_width_unit',['INCH', 'CM'])->nullable();
            $table->float('package_length')->nullable();
            $table->enum('package_length_unit',['INCH', 'CM'])->nullable();
            $table->float('package_height')->nullable();
            $table->enum('package_height_unit',['INCH', 'CM'])->nullable();
            $table->float('package_weight')->nullable();
            $table->enum('package_weight_unit',['OUNCE', 'POUND'])->nullable();
        
            $table->float('msrp_amount')->nullable();
            $table->enum('msrp_currency',['USD'])->nullable();
        
            $table->smallInteger('demand')->nullable();

            //o means offers 
            $table->string('o_market_brand')->nullable()->comment('o for Offers');
            $table->enum('o_country_code', ['US'])->nullable()->comment('o for Offers');

            $table->enum('o_new_market_price_currency',['USD'])->nullable()->comment('o for Offers');
            $table->float('o_new_market_price_amount')->nullable()->comment('o for Offers');
            
            $table->enum('o_new_market_place_fees_currency',['USD'])->nullable()->comment('o for Offers');
            $table->float('o_new_market_place_fees_amount')->nullable()->comment('o for Offers');

            $table->enum('o_new_fba_selling_fees_currency',['USD'])->nullable()->comment('o for Offers');
            $table->float('o_new_fba_selling_fees_amount')->nullable()->comment('o for Offers');

            $table->enum('o_new_tax_amount_currency',['USD'])->nullable()->comment('o for Offers');
            $table->float('o_new_tax_amount_amount')->nullable()->comment('o for Offers');

            $table->string('o_new_listing_url')->nullable()->comment('o for Offers');

            //msd means market specific data
            $table->string('o_msd_product_title')->nullable()->comment('o for Offers, msd for Market Specific Data');
            $table->string('o_msd_object_type')->nullable()->comment('o for Offers, msd for Market Specific Data');
            $table->enum('o_msd_estimated_sales_revenues_currency',['USD'])->nullable()->comment('o for Offers, msd for Market Specific Data');
            $table->float('o_msd_estimated_sales_revenues_amount')->nullable()->comment('o for Offers, msd for Market Specific Data');
            $table->integer('o_msd_estimated_unit_sold')->nullable()->comment('o for Offers, msd for Market Specific Data');

            //c means competition
            $table->enum('o_msd_c_level', ['HIGH', 'MEDIUM', 'LOW'])->nullable()->comment('o for Offers, msd for Market Specific Data, c for Competition');
            $table->integer('o_msd_c_number_of_offers')->nullable()->comment('o for Offers, msd for Market Specific Data, c for Competition');
        
            //lowest_ofrs means lowest Offer From Reputable Seller
            $table->enum('o_msd_c_lofrs_price_currency_code', ['USD'])->nullable()->comment('o for Offers, msd for Market Specific Data, c for Competition, lofrs for Lowest Offer From Reputable Seller');
            $table->float('o_msd_c_lofrs_price_amount')->nullable()->comment('o for Offers, msd for Market Specific Data, c for Competition, lofrs for Lowest Offer From Reputable Seller');
            $table->string('o_msd_c_lofrs_srating_positive_feedback_rating')->nullable()->comment('o for Offers, msd for Market Specific Data, c for Competition, lofrs for Lowest Offer From Reputable Seller, srating for Seller Rating');
            $table->integer('o_msd_c_lofrs_srating_number_of_seller_ratings')->nullable()->comment('o for Offers, msd for Market Specific Data, c for Competition, lofrs for Lowest Offer From Reputable Seller, srating for Seller Rating');
        
            $table->enum('o_msd_c_lowest_offer_price_currency_code', ['USD'])->nullable()->comment('o for Offers, msd for Market Specific Data, c for Competition');
            $table->float('o_msd_c_lowest_offer_price_amount')->nullable()->comment('o for Offers, msd for Market Specific Data, c for Competition');
            $table->string('o_msd_c_lowest_offer_srating_positive_feedback_rating')->nullable()->comment('o for Offers, msd for Market Specific Data, c for Competition, srating for Seller Rating');
            $table->integer('o_msd_c_lowest_offer_srating_number_of_seller_ratings')->nullable()->comment('o for Offers, msd for Market Specific Data, c for Competition, srating for Seller Rating');

            $table->enum('o_msd_c_buy_box_offering_price_currency_code', ['USD'])->nullable()->comment('o for Offers, msd for Market Specific Data, c for Competition');
            $table->float('o_msd_c_buy_box_offering_price_amount')->nullable()->comment('o for Offers, msd for Market Specific Data, c for Competition');
            $table->string('o_msd_c_buy_box_offering_srating_positive_feedback_rating')->nullable()->comment('o for Offers, msd for Market Specific Data, c for Competition, srating for Seller Rating');
            $table->integer('o_msd_c_buy_box_offering_srating_number_of_seller_ratings')->nullable()->comment('o for Offers, msd for Market Specific Data, c for Competition');

            $table->string('o_msd_c_amazon_offer_state')->nullable()->comment('o for Offers, msd for Market Specific Data, c for Competition');
            $table->string('o_msd_local_asin')->nullable()->comment('o for Offers, msd for Market Specific Data');

            $table->string('o_msd_amazon_category_name')->nullable()->comment('o for Offers, msd for Market Specific Data');
            $table->string('o_msd_amazon_category_id')->nullable()->comment('o for Offers, msd for Market Specific Data');
            $table->integer('o_msd_amazon_category_best_seller_ranking')->nullable()->comment('o for Offers, msd for Market Specific Data');
            $table->string('o_msd_solid_via_fba')->nullable()->comment('o for Offers, msd for Market Specific Data');
            $table->integer('o_msd_number_off_offers_sold_via_fba')->nullable()->comment('o for Offers, msd for Market Specific Data');

            $table->string('o_image_url')->nullable()->comment('o for Offers');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier_algopix');
    }
}
