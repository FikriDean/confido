<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('order_code');
            $table->string('ticket_code');
            $table->string('airline');
            $table->string('class');
            $table->string('pickup');
            $table->string('destination');
            $table->string('round_trip');
            $table->integer('number_of_tickets');
            $table->date('go_date');
            $table->date('return_date');
            $table->date('purchase_date');
            $table->string('payment_method');
            $table->string('name_on_card');
            $table->string('card_number');
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
        Schema::dropIfExists('orders');
    }
};
