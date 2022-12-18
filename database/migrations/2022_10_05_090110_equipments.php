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
        Schema::create("equipments", function (Blueprint $table) {

            $table->id();
            $table->string("name");
            $table->integer("cost");
            $table->integer("quantity");
            $table->string("vendor");
            $table->mediumText("description");
            $table->string("address");
            $table->string("contact");
            $table->date("date");

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
