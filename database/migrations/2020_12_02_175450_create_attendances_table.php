<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('outletId')->unsigned();
            $table->integer('workerId')->unsigned();
            $table->date('attendanceDate');
            $table->integer('attendanceShift')->unsigned();
            $table->integer('attendanceIncome');
            $table->integer('attendanceExpense');
            $table->integer('attendanceOmset');
            $table->time('attendanceCheckIn');
            $table->time('attendanceCheckOut');
            $table->string('attendanceMessage');
            $table->longText('attendanceNote');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->softDeletes();

            $table->foreign('outletId')->references('id')->on('outlets');
            $table->foreign('workerId')->references('id')->on('workers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
