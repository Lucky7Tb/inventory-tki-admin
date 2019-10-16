<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('item', function (Blueprint $table) {
            $table->foreign('room_id', 'FK_ITEM_ROOM_ID')->on('room_id')->references('room')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('item_category_id', 'FK_ITEM_ITEM_CATEGORY_ID')->on('item_category_id')->references('item_category')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item', function (Blueprint $table) {
            $table->dropForeign('FK_ITEM_ROOM_ID');
            $table->dropForeign('FK_ITEM_ITEM_CATEGORY_ID');       
        });
    }
}
