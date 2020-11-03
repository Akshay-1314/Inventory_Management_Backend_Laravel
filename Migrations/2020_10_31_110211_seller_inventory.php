<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SellerInventory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_inventory', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name');
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('selling_price');
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
        Schema::dropIfExists('seller_inventory');
    }
}
