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
