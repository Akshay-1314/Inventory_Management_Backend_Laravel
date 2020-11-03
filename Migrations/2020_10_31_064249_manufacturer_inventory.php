<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ManufacturerInventory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manufacturer_inventory', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name');
            $table->integer('quantity');
            $table->integer('production_cost');
            $table->integer('material_cost');
            $table->integer('price');
            $table->date('date_of_manufacture');
            $table->date('expiry_date');
            $table->string('name_of_manufacturer');
            $table->string('email');
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
        Schema::dropIfExists('manufacturer_inventory');
    }
}
