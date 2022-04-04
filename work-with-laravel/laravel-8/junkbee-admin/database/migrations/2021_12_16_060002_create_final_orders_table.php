<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinalOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('final_orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code');
            $table->foreignId('user_id');
            $table->integer('driver_id')->nullable();
            $table->integer('waste_collector_id')->nullable();
            $table->date('date');
            $table->integer('total_weight');
            $table->double('total');
            $table->double('fee_beever');
            $table->string('status');
            $table->string('location1');
            $table->string('location2');
            $table->string('reason')->nullable();
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
        Schema::dropIfExists('final_orders');
    }
}
