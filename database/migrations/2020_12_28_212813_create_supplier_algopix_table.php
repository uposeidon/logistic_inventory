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
        /*

        Schema design fields 
        itemDetails->aid;
        itemDetails->ids->UPC[];
        itemDetails->ids->EAN[];
        itemDetails->ids->ASIN[];
        itemDetails->ids->ASIN[];
        
        itemDetails->titles->en;
        
        itemDetails->titles->en;
        itemDetails->model;
        itemDetails->color;
        itemDetails->brand;
        itemDetails->imageUrl;
        itemDetails->description;

        itemDetails->itemDimensions->width->unit;
        itemDetails->itemDimensions->width->unit;

        itemDetails->itemDimensions->length->unit;
        itemDetails->itemDimensions->length->unit;

        itemDetails->itemDimensions->height->unit;
        itemDetails->itemDimensions->height->unit;

        itemDetails->itemDimensions->weight->unit;
        itemDetails->itemDimensions->weight->unit;

        itemDetails->packageDimensions->width->unit;
        itemDetails->packageDimensions->width->unit;

        itemDetails->packageDimensions->length->unit;
        itemDetails->packageDimensions->length->unit;

        itemDetails->packageDimensions->height->unit;
        itemDetails->packageDimensions->height->unit;

        itemDetails->packageDimensions->weight->unit;
        itemDetails->packageDimensions->weight->unit;

        itemDetails->msrp->currencyCode;
        itemDetails->msrp->amount;
        
        demand->US;
        
        offers[]->marketBrand;
        offers[]->countryCode;
        offers[]->offers->NEW->marketPrice->currencyCode;
        offers[]->offers->NEW->marketPrice->amount;
        
        offers[]->offers->NEW->marketPlaceFees->currencyCode;
        offers[]->offers->NEW->marketPlaceFees->amount;

        offers[]->offers->NEW->fbaSellingFees->currencyCode;
        offers[]->offers->NEW->fbaSellingFees->amount;

        offers[]->offers->NEW->taxAmount->currencyCode;
        offers[]->offers->NEW->taxAmount->amount;

        offers[]->offers->NEW->listingUrl;

        offers[]->marketSpecificData->marketSpecificProductTitle;
        offers[]->marketSpecificData->objectType;

        offers[]->marketSpecificData->estimatedSalesRevenues->currencyCode;
        offers[]->marketSpecificData->estimatedSalesRevenues->amount;

        offers[]->marketSpecificData->estimatedUnitSold;

        offers[]->marketSpecificData->competition->level;
        offers[]->marketSpecificData->competition->numberOfOffers;

        offers[]->marketSpecificData->competition->lowestOfferFromReputableSeller->price->currencyCode;
        offers[]->marketSpecificData->competition->lowestOfferFromReputableSeller->price->amount;
        offers[]->marketSpecificData->competition->lowestOfferFromReputableSeller->sellerRating->positiveFeedbackRating;
        offers[]->marketSpecificData->competition->lowestOfferFromReputableSeller->sellerRating->numberOfSellerRatings;
        
        offers[]->marketSpecificData->competition->lowestOffer->price->currencyCode;
        offers[]->marketSpecificData->competition->lowestOffer->price->amount;
        offers[]->marketSpecificData->competition->lowestOffer->sellerRating->positiveFeedbackRating;
        offers[]->marketSpecificData->competition->lowestOffer->sellerRating->numberOfSellerRatings;
        
        offers[]->marketSpecificData->competition->buyBoxOffering->price->currencyCode;
        offers[]->marketSpecificData->competition->buyBoxOffering->price->amount;
        offers[]->marketSpecificData->competition->buyBoxOffering->sellerRating->positiveFeedbackRating;
        offers[]->marketSpecificData->competition->buyBoxOffering->sellerRating->numberOfSellerRatings;
        
        
        offers[]->marketSpecificData->competition->amazonOfferState;

        offers[]->marketSpecificData->localAsin;

        offers[]->marketSpecificData->amazonCategories[]->name;
        offers[]->marketSpecificData->amazonCategories[]->id;
        offers[]->marketSpecificData->amazonCategories[]->bestSellerRanking;

        offers[]->marketSpecificData->soldViaFBA;
        offers[]->marketSpecificData->numberOfOffersSoldViaFBA;

        offers[]->imageSet[] element
        */
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
        
            $table->tinyInteger('demand')->nullable();



        // offers[]->marketBrand;

        // offers[]->countryCode;
        // offers[]->offers->NEW->marketPrice->currencyCode;
        // offers[]->offers->NEW->marketPrice->amount;
        
        // offers[]->offers->NEW->marketPlaceFees->currencyCode;
        // offers[]->offers->NEW->marketPlaceFees->amount;

        // offers[]->offers->NEW->fbaSellingFees->currencyCode;
        // offers[]->offers->NEW->fbaSellingFees->amount;

        // offers[]->offers->NEW->taxAmount->currencyCode;
        // offers[]->offers->NEW->taxAmount->amount;

        // offers[]->offers->NEW->listingUrl;

        // offers[]->marketSpecificData->marketSpecificProductTitle;
        // offers[]->marketSpecificData->objectType;

        // offers[]->marketSpecificData->estimatedSalesRevenues->currencyCode;
        // offers[]->marketSpecificData->estimatedSalesRevenues->amount;

        // offers[]->marketSpecificData->estimatedUnitSold;

        // offers[]->marketSpecificData->competition->level;
        // offers[]->marketSpecificData->competition->numberOfOffers;

        // offers[]->marketSpecificData->competition->lowestOfferFromReputableSeller->price->currencyCode;
        // offers[]->marketSpecificData->competition->lowestOfferFromReputableSeller->price->amount;
        // offers[]->marketSpecificData->competition->lowestOfferFromReputableSeller->sellerRating->positiveFeedbackRating;
        // offers[]->marketSpecificData->competition->lowestOfferFromReputableSeller->sellerRating->numberOfSellerRatings;
        
        // offers[]->marketSpecificData->competition->lowestOffer->price->currencyCode;
        // offers[]->marketSpecificData->competition->lowestOffer->price->amount;
        // offers[]->marketSpecificData->competition->lowestOffer->sellerRating->positiveFeedbackRating;
        // offers[]->marketSpecificData->competition->lowestOffer->sellerRating->numberOfSellerRatings;
        
        // offers[]->marketSpecificData->competition->buyBoxOffering->price->currencyCode;
        // offers[]->marketSpecificData->competition->buyBoxOffering->price->amount;
        // offers[]->marketSpecificData->competition->buyBoxOffering->sellerRating->positiveFeedbackRating;
        // offers[]->marketSpecificData->competition->buyBoxOffering->sellerRating->numberOfSellerRatings;
        
        
        // offers[]->marketSpecificData->competition->amazonOfferState;

        // offers[]->marketSpecificData->localAsin;

        // offers[]->marketSpecificData->amazonCategories[]->name;
        // offers[]->marketSpecificData->amazonCategories[]->id;
        // offers[]->marketSpecificData->amazonCategories[]->bestSellerRanking;

        // offers[]->marketSpecificData->soldViaFBA;
        // offers[]->marketSpecificData->numberOfOffersSoldViaFBA;

        // offers[]->imageSet[] element


            
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
