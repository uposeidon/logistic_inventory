<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            
            $table->string('seller');
            $table->bigInteger('listing_id');
            $table->longText('description');
            $table->string('x_z_asin');
            $table->bigInteger('upc')->nullable();
            $table->string('boo_asin');
            $table->tinyInteger('quantity');
            $table->float('msrp');
            $table->float('ext_msrp');
            $table->string('package_id');
            $table->string('warehouse');

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
        Schema::dropIfExists('suppliers');
    }
}
