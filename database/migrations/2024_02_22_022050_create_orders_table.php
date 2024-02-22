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
            $table->string('customer_name', 100);
            $table->string('table_no', 5);
            $table->date('order_date');
            $table->string('order_time', 100);
            $table->string('status', 100);
            $table->integer('total')->unsigned();
            $table->unsignedBigInteger('waitress_id');
            $table->unsignedBigInteger('cashier_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('waitress_id')->references( 'id' )->on( 'users' )->onDelete( 'cascade' );
            $table->foreign('cashier_id')->references( 'id' )->on( 'users' )->onDelete( 'cascade' );
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
