<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ItemsSoldManfacturer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_sold_manufacturer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name');
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('selling_price');
            $table->date('date_of_manufacture');
            $table->date('expiry_date');
            $table->string('name_of_manufacturer');
            $table->string('sellers_email');
            $table->string('manufacturers_email');
            $table->date('date_of_transaction')->nullable();
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
        Schema::dropIfExists('items_sold_manufacturer');
    }
}
