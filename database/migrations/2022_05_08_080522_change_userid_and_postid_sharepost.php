<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUseridAndPostidSharepost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('share_posts', function (Blueprint $table) {
            $table->foreign('user_id')->references("id")->on("users");
            $table->foreign('post_id')->references("id")->on("posts");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('share_posts', function (Blueprint $table) {
            //
        });
    }
}
