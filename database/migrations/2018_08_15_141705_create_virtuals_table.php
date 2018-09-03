<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVirtualsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('virtuals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->integer('va_status');
            $table->string('trx_id');
            $table->string('trx_amount');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->string('virtual_account');
            $table->string('datetime_expired');
            $table->text('description');
            $table->string('jalur');
            $table->string('tipe_bayar');
            $table->string('nomer_pendaftaran');
            $table->string('payment_status');
            $table->string('payment_date');
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
        Schema::drop('virtuals');
    }
}
