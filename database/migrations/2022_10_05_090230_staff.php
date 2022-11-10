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
        Schema::create("staff", function(Blueprint $table) {

            $table->id("user_id");
            $table->string("username");
            $table->string("password");
            $table->string("email");
            $table->string("full_name");
            $table->string("address");
            $table->string("role");
            $table->string("gender");
            $table->string("contact");


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
