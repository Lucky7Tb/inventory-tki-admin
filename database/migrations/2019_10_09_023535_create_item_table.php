<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
            $table->string('item_name', 6)->primary();
            $table->string('item_name', 50);
            $table->string('item_conditions', ['Baik', 'Tidak Baik']);
            $table->integer('item_ammount')->unsigned();
            $table->string('room_id', 6)->index();
            $table->string('item_category_id', 6)->index();
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
        Schema::dropIfExists('item');
    }
}
