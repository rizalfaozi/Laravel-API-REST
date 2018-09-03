<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogvaTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_va', function (Blueprint $table) {
            $table->increments('id');
            $table->string('trx_va');
            $table->string('caller');
            $table->text('json');
            $table->text('json_result');
            $table->string('debug');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('log_va');
    }
}
