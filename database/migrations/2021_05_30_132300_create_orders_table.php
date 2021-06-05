<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->float('total', 8, 2)->nullable();
            $table->string('contact_name');
            $table->string('contact_phone');
            $table->text('contact_address');
            $table->enum('payment_type', ['cash', 'card']);
            $table->dateTime('paid_at')->nullable();
            $table->enum('status', ['waitPayment', 'processing', 'onTheWay', 'delivered', 'closed']);
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
}
