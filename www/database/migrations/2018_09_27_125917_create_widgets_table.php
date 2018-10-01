<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWidgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        {
            Schema::create('widgets', function (Blueprint $table) {
                $table->increments('id');
                $table->boolean('enable')->default(1);
                $table->integer('order')->nullable();
                $table->string('type')->nullable();
                $table->string('name')->nullable();
                $table->binary('html')->nullable();
                $table->timestamps();
            });
        }
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
}
