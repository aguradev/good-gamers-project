<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamelistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gamelist_table', function (Blueprint $table) {
            $table->increments("id", true);
            $table->string("title_game", 100);
            $table->string("slug");
            $table->integer("price");
            $table->string("story_game");
            $table->longText("photo_cover");
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
        Schema::dropIfExists('gamelist');
    }
}
