<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MoviesCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movies_categories2', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->number('movie_id');
            $table->number('category_id');
            $table->string('category_name');
            
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movies_categories', function (Blueprint $table) {
            //
        });
    }
}
