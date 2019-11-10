<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowing', function (Blueprint $table) {
            $table->string('borrowing_id', 6)->primary();
            $table->string('student_id', 6)->index();
            $table->string('item_id', 6)->index();
            $table->integer('item_ammount')->unsigned();
            $table->date('borrowing_date');
            $table->date('borrowing_date_return');
            $table->enum('borrowing_status', ['Dipinjam','Dikembalikan', 'Belum Diambil'])->default('Dipinjam')->nullable();
            $table->enum('status', ['Confirm', 'Not Confirm'])->default('Confirm')->nullable();
            $table->timestamps();

            $table->foreign('student_id', 'FK_BORROWING_STUDENT_ID')->references('student_id')->on('student')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('item_id', 'FK_BORROWING_ITEM_ID')->references('item_id')->on('item')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrowing');


        Schema::table('borrowing', function (Blueprint $table) {
            $table->dropForeign('FK_BORROWING_STUDENT_ID');
            $table->dropForeign('FK_BORROWING_ITEM_ID');       
        });
    }
}
