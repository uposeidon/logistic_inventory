<?php

namespace App\Console\Commands;

use App\SupplierAlgopix;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class algopix extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'algopix:read {keyword : The keyword for the API}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'The purpose of this command to fetch data from api and save it to database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('API is calling');

        $keyword = $this->argument('keyword');
        if(empty($keyword))
        {
            return 'Keyword is missing';
        }
        $client = new Client([
            'headers' => [ 
                'X-API-KEY' => 'BkhPLjLLbDf3F042Xt2zK1FgYyIMSkSM5HD4Xh1g',
                'X-APP-ID' => '9Z7YDklZJHJgPskhL9PBTU',
                'Content-Type' => 'application/json'
                ]
        ]);
        
        $response = $client->get('https://api.algopix.com/v3/search', [ 
            'query' => [
                'keywords' => $keyword,
            ]
        ]);
        $responseData = json_decode($response->getBody(),true);
        
        if(!empty($responseData['result']) && ($responseData['statusMessage']=='Ok'))
        {

            $data = [];

            if(!empty($responseData['result']['itemDetails'])){
                $itemDetails = $responseData['result']['itemDetails'];
                // at the end need to push an array to save data in database.
                $data['aid'] = $itemDetails['aid'] ?? null;
                
                $data['upc'] = $itemDetails['ids']['UPC'][0] ?? null;
                $data['ean'] = $itemDetails['ids']['EAN'][0] ?? null;
                $data['asin'] = $itemDetails['ids']['ASIN'][0] ?? null;

                $data['title'] = $itemDetails['titles']['en'] ?? null;

                $data['model'] = $itemDetails['model'] ?? null;
                $data['color'] = $itemDetails['color'] ?? null;
                $data['brand'] = $itemDetails['brand'] ?? null;
                
                $data['image_url'] = $itemDetails['image_url'] ?? null;
                $data['description'] = $itemDetails['description'] ?? null;

                if(!empty($itemDetails['itemDimensions'])){
                    $itemDimensions = $itemDetails['itemDimensions'];

                    $data['item_width'] = $itemDimensions['width']['value'] ?? null;
                    $data['item_width_unit'] = $itemDimensions['width']['unit'] ?? null;

                    $data['item_length'] = $itemDimensions['length']['value'] ?? null;
                    $data['item_length_unit'] = $itemDimensions['length']['unit'] ?? null;

                    $data['item_height'] = $itemDimensions['height']['value'] ?? null;
                    $data['item_height_unit'] = $itemDimensions['height']['unit'] ?? null;

                    $data['item_weight'] = $itemDimensions['weight']['value'] ?? null;
                    $data['item_weight_unit'] = $itemDimensions['weight']['unit'] ?? null;
                }
                if(!empty($itemDetails['packageDimensions'])){
                    $packageDimensions = $itemDetails['packageDimensions'];

                    $data['package_width'] = $packageDimensions['width']['value'] ?? null;
                    $data['package_width_unit'] = $packageDimensions['width']['unit'] ?? null;

                    $data['package_length'] = $packageDimensions['length']['value'] ?? null;
                    $data['package_length_unit'] = $packageDimensions['length']['unit'] ?? null;

                    $data['package_height'] = $packageDimensions['height']['value'] ?? null;
                    $data['package_height_unit'] = $packageDimensions['height']['unit'] ?? null;

                    $data['package_weight'] = $packageDimensions['weight']['value'] ?? null;
                    $data['package_weight_unit'] = $packageDimensions['weight']['unit'] ?? null;
                }

                $data['msrp_currency'] = $itemDetails['msrp']['currencyCode'] ?? null;
                $data['msrp_amount'] = $itemDetails['msrp']['amount'] ?? null;
            }

            if(!empty($responseData['result']['demand'])){
                $data['demand'] = $responseData['result']['demand']['US'];
            }

            if(!empty($responseData['result']['offers'])){
                $offer = $responseData['result']['offers'][0];

                $data['o_market_brand'] = $offer['marketBrand'] ?? null;
                $data['o_country_code'] = $offer['countryCode'] ?? null;

                $new_offer = $offer['offers']['NEW'];
                $data['o_new_market_price_currency'] = $new_offer['marketPrice']['currencyCode'] ?? null;
                $data['o_new_market_price_amount'] = $new_offer['marketPrice']['amount'] ?? null;

                $data['o_new_market_place_fees_currency'] = $new_offer['marketPlaceFees']['currencyCode'] ?? null;
                $data['o_new_market_place_fees_amount'] = $new_offer['marketPlaceFees']['amount'] ?? null;

                $data['o_new_fba_selling_fees_currency'] = $new_offer['fbaSellingFees']['currencyCode'] ?? null;
                $data['o_new_fba_selling_fees_amount'] = $new_offer['fbaSellingFees']['amount'] ?? null;

                $data['o_new_tax_amount_currency'] = $new_offer['taxAmount']['currencyCode'] ?? null;
                $data['o_new_tax_amount_amount'] = $new_offer['taxAmount']['amount'] ?? null;

                $data['o_new_listing_url'] = $new_offer['listingUrl'] ?? null;

                $marketSpecificData = $offer['marketSpecificData'];
                $data['o_msd_product_title'] = $marketSpecificData['marketSpecificProductTitle'] ?? null;
                $data['o_msd_object_type'] = $marketSpecificData['objectType'] ?? null;
                $data['o_msd_estimated_sales_revenues_currency'] = $marketSpecificData['estimatedSalesRevenues']['currencyCode'] ?? null;
                $data['o_msd_estimated_sales_revenues_amount'] = $marketSpecificData['estimatedSalesRevenues']['amount'] ?? null;
                $data['o_msd_estimated_unit_sold'] = $marketSpecificData['estimatedUnitSold'] ?? null;
                // // offers[]->marketSpecificData->competition->level;
                // // offers[]->marketSpecificData->competition->numberOfOffers;

                //     //c means competition
                //     $table->enum('o_msd_c_level', ['HIGH', 'MEDIUM', 'LOW'])->nullable();
                //     $table->tinyInteger('o_msd_c_number_of_offers')->nullable();
                $data['o_msd_c_level'] = $marketSpecificData['competition']['level'] ?? null;
                $data['o_msd_c_number_of_offers'] = $marketSpecificData['competition']['numberOfOffers'] ?? null;
                
                $competition = $marketSpecificData['competition'];
        // // offers[]->marketSpecificData->competition->lowestOfferFromReputableSeller->price->currencyCode;
        // // offers[]->marketSpecificData->competition->lowestOfferFromReputableSeller->price->amount;
        // // offers[]->marketSpecificData->competition->lowestOfferFromReputableSeller->sellerRating->positiveFeedbackRating;
        // // offers[]->marketSpecificData->competition->lowestOfferFromReputableSeller->sellerRating->numberOfSellerRatings;
                
        //     //lowest_ofrs means lowest Offer From Reputable Seller
        //     $table->enum('o_msd_c_lofrs_price_currency_code', ['USD'])->nullable();
        //     $table->float('o_msd_c_lofrs_price_amount')->nullable();
        //     $table->string('o_msd_c_lofrs_srating_positive_feedback_rating')->nullable();
        //     $table->tinyInteger('o_msd_c_lofrs_srating_number_of_seller_ratings')->nullable();
                $data['o_msd_c_lofrs_price_currency_code'] = $competition['lowestOfferFromReputableSeller']['price']['currencyCode'] ?? null;
                $data['o_msd_c_lofrs_price_amount'] = $competition['lowestOfferFromReputableSeller']['price']['amount'] ?? null;
                $data['o_msd_c_lofrs_srating_positive_feedback_rating'] = $competition['lowestOfferFromReputableSeller']['sellerRating']['positiveFeedbackRating'] ?? null;
                $data['o_msd_c_lofrs_srating_number_of_seller_ratings'] = $competition['lowestOfferFromReputableSeller']['sellerRating']['numberOfSellerRatings'] ?? null;
                                
        // // offers[]->marketSpecificData->competition->lowestOffer->price->currencyCode;
        // // offers[]->marketSpecificData->competition->lowestOffer->price->amount;
        // // offers[]->marketSpecificData->competition->lowestOffer->sellerRating->positiveFeedbackRating;
        // // offers[]->marketSpecificData->competition->lowestOffer->sellerRating->numberOfSellerRatings;
        
        //     $table->enum('o_msd_c_lowest_offer_price_currency_code', ['USD'])->nullable();
        //     $table->float('o_msd_c_lowest_offer_price_amount')->nullable();
        //     $table->string('o_msd_c_lowest_offer_srating_positive_feedback_rating')->nullable();
        //     $table->tinyInteger('o_msd_c_lowest_offer_srating_number_of_seller_ratings')->nullable();
        
                $data['o_msd_c_lowest_offer_price_currency_code'] = $competition['lowestOffer']['price']['currencyCode'] ?? null;
                $data['o_msd_c_lowest_offer_price_amount'] = $competition['lowestOffer']['price']['amount'] ?? null;
                $data['o_msd_c_lowest_offer_srating_positive_feedback_rating'] = $competition['lowestOffer']['sellerRating']['positiveFeedbackRating'] ?? null;
                $data['o_msd_c_lowest_offer_srating_number_of_seller_ratings'] = $competition['lowestOffer']['sellerRating']['numberOfSellerRatings'] ?? null;
        
        // // offers[]->marketSpecificData->competition->buyBoxOffering->price->currencyCode;
        // // offers[]->marketSpecificData->competition->buyBoxOffering->price->amount;
        // // offers[]->marketSpecificData->competition->buyBoxOffering->sellerRating->positiveFeedbackRating;
        // // offers[]->marketSpecificData->competition->buyBoxOffering->sellerRating->numberOfSellerRatings;
        
        //     $table->enum('o_msd_c_buy_box_offering_price_currency_code', ['USD'])->nullable();
        //     $table->float('o_msd_c_buy_box_offering_price_amount')->nullable();
        //     $table->string('o_msd_c_buy_box_offering_srating_positive_feedback_rating')->nullable();
        //     $table->tinyInteger('o_msd_c_buy_box_offering_srating_number_of_seller_ratings')->nullable();
                $data['o_msd_c_buy_box_offering_price_currency_code'] = $competition['buyBoxOffering']['price']['currencyCode'] ?? null;
                $data['o_msd_c_buy_box_offering_price_amount'] = $competition['buyBoxOffering']['price']['amount'] ?? null;
                $data['o_msd_c_buy_box_offering_srating_positive_feedback_rating'] = $competition['buyBoxOffering']['sellerRating']['positiveFeedbackRating'] ?? null;
                $data['o_msd_c_buy_box_offering_srating_number_of_seller_ratings'] = $competition['buyBoxOffering']['sellerRating']['numberOfSellerRatings'] ?? null;
        // // offers[]->marketSpecificData->competition->amazonOfferState;
        // // offers[]->marketSpecificData->localAsin;

        //     $table->string('o_msd_c_amazon_offer_state')->nullable();
        //     $table->string('o_msd_local_asin')->nullable();
        
                $data['o_msd_c_amazon_offer_state'] = $competition['amazonOfferState'] ?? null;
                $data['o_msd_local_asin'] = $marketSpecificData['localAsin'] ?? null;
        
        // // offers[]->marketSpecificData->amazonCategories[]->name;
        // // offers[]->marketSpecificData->amazonCategories[]->id;
        // // offers[]->marketSpecificData->amazonCategories[]->bestSellerRanking;

        //     $table->string('o_msd_amazon_category_name')->nullable();
        //     $table->string('o_msd_amazon_category_id')->nullable();
        //     $table->integer('o_msd_amazon_category_best_seller_ranking')->nullable();
                $amazon_category = $marketSpecificData['amazonCategories'][0];
                $data['o_msd_amazon_category_name'] = $amazon_category['name'] ?? null;
                $data['o_msd_amazon_category_id'] = $amazon_category['id'] ?? null;
                $data['o_msd_amazon_category_best_seller_ranking'] = $amazon_category['bestSellerRanking'] ?? null;
        
        // // offers[]->marketSpecificData->soldViaFBA;
        // // offers[]->marketSpecificData->numberOfOffersSoldViaFBA;
        //     $table->string('o_msd_solid_via_fba')->nullable();
        //     $table->tinyInteger('o_msd_number_off_offers_sold_via_fba')->nullable();
        
                $data['o_msd_solid_via_fba'] = $marketSpecificData['soldViaFBA'] ?? null;
                $data['o_msd_number_off_offers_sold_via_fba'] = $marketSpecificData['numberOfOffersSoldViaFBA'] ?? null;
        
                $data['o_image_url'] = $offer['imageSet'][0] ?? null;
                //dd($data);
        
        // // offers[]->imageSet[] element
        //     $table->string('o_image_url')->nullable();


            }
            dd($data);
        // // offers[]->marketSpecificData->marketSpecificProductTitle;
        // // offers[]->marketSpecificData->objectType;
        // // offers[]->marketSpecificData->estimatedSalesRevenues->currencyCode;
        // // offers[]->marketSpecificData->estimatedSalesRevenues->amount;
        // // offers[]->marketSpecificData->estimatedUnitSold;

        //     //msd means market specific data
        //     $table->string('o_msd_product_title')->nullable();
        //     $table->string('o_msd_object_type')->nullable();
        //     $table->enum('o_msd_estimated_sales_revenues_currency',['USD'])->nullable();
        //     $table->float('o_msd_estimated_sales_revenues_amount')->nullable();
        //     $table->tinyInteger('o_msd_estimated_unit_sold')->nullable();

        // // offers[]->marketSpecificData->competition->level;
        // // offers[]->marketSpecificData->competition->numberOfOffers;

        //     //c means competition
        //     $table->enum('o_msd_c_level', ['HIGH', 'MEDIUM', 'LOW'])->nullable();
        //     $table->tinyInteger('o_msd_c_number_of_offers')->nullable();
            
        // // offers[]->marketSpecificData->competition->lowestOfferFromReputableSeller->price->currencyCode;
        // // offers[]->marketSpecificData->competition->lowestOfferFromReputableSeller->price->amount;
        // // offers[]->marketSpecificData->competition->lowestOfferFromReputableSeller->sellerRating->positiveFeedbackRating;
        // // offers[]->marketSpecificData->competition->lowestOfferFromReputableSeller->sellerRating->numberOfSellerRatings;
        
        //     //lowest_ofrs means lowest Offer From Reputable Seller
        //     $table->enum('o_msd_c_lofrs_price_currency_code', ['USD'])->nullable();
        //     $table->float('o_msd_c_lofrs_price_amount')->nullable();
        //     $table->string('o_msd_c_lofrs_srating_positive_feedback_rating')->nullable();
        //     $table->tinyInteger('o_msd_c_lofrs_srating_number_of_seller_ratings')->nullable();
        

        // // offers[]->marketSpecificData->competition->lowestOffer->price->currencyCode;
        // // offers[]->marketSpecificData->competition->lowestOffer->price->amount;
        // // offers[]->marketSpecificData->competition->lowestOffer->sellerRating->positiveFeedbackRating;
        // // offers[]->marketSpecificData->competition->lowestOffer->sellerRating->numberOfSellerRatings;
        
        //     $table->enum('o_msd_c_lowest_offer_price_currency_code', ['USD'])->nullable();
        //     $table->float('o_msd_c_lowest_offer_price_amount')->nullable();
        //     $table->string('o_msd_c_lowest_offer_srating_positive_feedback_rating')->nullable();
        //     $table->tinyInteger('o_msd_c_lowest_offer_srating_number_of_seller_ratings')->nullable();

        // // offers[]->marketSpecificData->competition->buyBoxOffering->price->currencyCode;
        // // offers[]->marketSpecificData->competition->buyBoxOffering->price->amount;
        // // offers[]->marketSpecificData->competition->buyBoxOffering->sellerRating->positiveFeedbackRating;
        // // offers[]->marketSpecificData->competition->buyBoxOffering->sellerRating->numberOfSellerRatings;
        
        //     $table->enum('o_msd_c_buy_box_offering_price_currency_code', ['USD'])->nullable();
        //     $table->float('o_msd_c_buy_box_offering_price_amount')->nullable();
        //     $table->string('o_msd_c_buy_box_offering_srating_positive_feedback_rating')->nullable();
        //     $table->tinyInteger('o_msd_c_buy_box_offering_srating_number_of_seller_ratings')->nullable();

        // // offers[]->marketSpecificData->competition->amazonOfferState;
        // // offers[]->marketSpecificData->localAsin;

        //     $table->string('o_msd_c_amazon_offer_state')->nullable();
        //     $table->string('o_msd_local_asin')->nullable();

        
        // // offers[]->marketSpecificData->amazonCategories[]->name;
        // // offers[]->marketSpecificData->amazonCategories[]->id;
        // // offers[]->marketSpecificData->amazonCategories[]->bestSellerRanking;

        //     $table->string('o_msd_amazon_category_name')->nullable();
        //     $table->string('o_msd_amazon_category_id')->nullable();
        //     $table->integer('o_msd_amazon_category_best_seller_ranking')->nullable();

        // // offers[]->marketSpecificData->soldViaFBA;
        // // offers[]->marketSpecificData->numberOfOffersSoldViaFBA;

        //     $table->string('o_msd_solid_via_fba')->nullable();
        //     $table->tinyInteger('o_msd_number_off_offers_sold_via_fba')->nullable();

        // // offers[]->imageSet[] element
        //     $table->string('o_image_url')->nullable();















            if(!empty($data)){
                $data['created_at'] = Carbon::now();
                $data['updated_at'] = Carbon::now();
                SupplierAlgopix::create($data);
                $this->info('Record Addedd Successfully!');
            }else{
                $this->info('Issue with Record');
            }

        }else{
            $this->info('API Response is not OK');
        }
        
        return 0;     
    }
}
