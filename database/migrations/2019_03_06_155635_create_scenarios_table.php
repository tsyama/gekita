<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScenariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scenarios', function (Blueprint $table) {
            $table->increments('id');
            $table
                ->string('title', 255)
                ->default(null)
                ->comment('タイトル');
            $table
                ->mediumText('body')
                ->default(null)
                ->comment('本文');
            $table->timestamps();
            $table->softDeletes();

            $table->index(['title']);
            $table->index(['created_at']);
            $table->index(['updated_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scenarios');
    }
}
