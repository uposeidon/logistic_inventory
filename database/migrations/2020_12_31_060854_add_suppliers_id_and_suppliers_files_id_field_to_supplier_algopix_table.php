<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSuppliersIdAndSuppliersFilesIdFieldToSupplierAlgopixTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('supplier_algopix', function (Blueprint $table) {
            
            $table->foreignId('suppliers_id')->nullable();
            $table->foreign('suppliers_id')->references('id')->on('suppliers');

            $table->foreignId('suppliers_files_id')->nullable();
            $table->foreign('suppliers_files_id')->references('id')->on('suppliers_files');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('supplier_algopix', function (Blueprint $table) {
            $table->dropColumn('suppliers_id');
            $table->dropColumn('suppliers_files_id');
        });
    }
}
