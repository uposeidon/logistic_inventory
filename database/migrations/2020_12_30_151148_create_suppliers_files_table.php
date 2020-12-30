<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers_files', function (Blueprint $table) {
            $table->id();
            $table->string('file_name');
            $table->enum('status',['new','in-progress','done','cancelled']);
            $table->integer('total_records')->nullable();
            $table->integer('process_records')->nullable();

           

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
        Schema::dropIfExists('suppliers_files');
    }
}
