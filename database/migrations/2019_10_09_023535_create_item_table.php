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
            $table->string('item_id', 6)->primary();
            $table->string('item_name', 50);
            $table->enum('item_conditions', ['Baik', 'Tidak Baik']);
            $table->integer('item_ammount')->unsigned();
            $table->string('room_id', 6)->index();
            $table->string('item_category_id', 6)->index();
            $table->timestamps();

            $table->foreign('room_id', 'FK_ITEM_ROOM_ID')->references('room_id')->on('room')->onDelete('CASCADE')->onUpdate('CASCADE');
            
            $table->foreign('item_category_id', 'FK_ITEM_ITEM_CATEGORY_ID')->references('item_category_id')->on('item_category')->onDelete('CASCADE')->onUpdate('CASCADE');
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

        Schema::table('item', function (Blueprint $table) {
            $table->dropForeign('FK_ITEM_ROOM_ID');
            $table->dropForeign('FK_ITEM_ITEM_CATEGORY_ID');       
        });
    }
}
