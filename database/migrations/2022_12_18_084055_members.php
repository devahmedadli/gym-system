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
        Schema::create("members", function (Blueprint $table) {

            $table->id();
            $table->string("username");
            $table->string("full_name");
            $table->string("gender");
            $table->date("reg_date")->nullable();
            $table->string("services")->nullable();
            $table->integer("amount")->nullable();
            $table->date("paid_date")->nullable();
            $table->string("p_year")->nullable();
            $table->integer("plan")->nullable();
            $table->string("address")->nullable();
            $table->string("contact")->nullable();
            $table->string("status")->nullable();
            $table->integer("attendance_count")->default(0);
            $table->integer("ini_weight")->nullable();
            $table->integer("curr_weight")->nullable();
            $table->string("ini_body_type")->nullable();
            $table->string("curr_body_type")->nullable();
            $table->date("progress_date")->nullable();
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
