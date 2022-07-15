<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments("id", true);
            $table->integer("games_id")->unsigned();
            $table->integer("users_id")->unsigned();
            $table->integer("payment_gateway_id")->unsigned();
            $table->string("status_payment");
            $table->foreign("games_id")->references("id")->on("gamelist_table");
            $table->foreign("users_id")->references("id")->on("users");
            $table->foreign("payment_gateway_id")->references("id")->on("payment_gateway");
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
        Schema::dropIfExists('invoices');
    }
}
