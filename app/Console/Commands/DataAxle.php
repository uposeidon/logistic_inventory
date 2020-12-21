<?php

namespace App\Console\Commands;

use App\DataAxle\DataAxleCore;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class DataAxle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data-axle:read';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $dataAxleCore = new DataAxleCore();
        $count = $dataAxleCore->callAPI();
        $this->info('Total Inserted Records are '. $count);
    }
}