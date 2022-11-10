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
        Schema::create("members", function(Blueprint $table) {

            $table->id("member_id");
            $table->string("username");
            $table->string("full_name");
            $table->string("password");
            $table->string("gender");
            $table->date("reg_date");
            $table->string("services");
            $table->integer("amount");
            $table->date("paid_date");
            $table->string("p_year");
            $table->integer("plan");
            $table->string("address");
            $table->string("contact");
            $table->string("status");
            $table->integer("attendance_count");
            $table->integer("ini_weight");
            $table->integer("curr_weight");
            $table->string("ini_body_type");
            $table->string("curr_body_type");
            $table->date("progress_date");
            $table->integer("reminders");


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
