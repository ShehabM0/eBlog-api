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
        Schema::create('post_categories', function (Blueprint $table) {
            $table->unsignedBigInteger("post_id");
            $table->tinyInteger("category_id", false, true)->nullable();
            $table->foreign("post_id")->references("id")->on("posts")->onDelete("CASCADE");
            $table->foreign("category_id")->references("id")->on("categories")->onDelete("SET NULL");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_categories');
    }
};
