<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donasis', function (Blueprint $table) {
            $table->id();

            $table->string('payment_status');
            $table->string('nama')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('order_id')->nullable();
            $table->string('gross_amount');
            $table->string('payment_type')->nullable();
            $table->string('snap_token', 36)->nullable();

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
        Schema::dropIfExists('donasis');
    }
}
