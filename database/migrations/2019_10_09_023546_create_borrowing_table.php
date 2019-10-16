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
            $table->enum('borrowing_status', ['1','0'])->default('0')->nullable();
            $table->enum('status', ['1', '0'])->default('0')->nullable();
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
        Schema::dropIfExists('borrowing');
    }
}
