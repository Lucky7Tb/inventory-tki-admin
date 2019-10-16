<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToBorrowingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('borrowing', function (Blueprint $table) {
            $table->foreign('student_id', 'FK_BORROWING_STUDENT_ID')->on('student_id')->references('student')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('item_id', 'FK_BORROWING_ITEM_ID')->on('item_id')->references('item')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('borrowing', function (Blueprint $table) {
            $table->dropForeign('FK_BORROWING_STUDENT_ID');
            $table->dropForeign('FK_BORROWING_ITEM_ID');       
        });
    }
}
