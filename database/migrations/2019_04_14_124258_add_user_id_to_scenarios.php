<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToScenarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scenarios', function (Blueprint $table) {
            $table->unsignedInteger('user_id')
                ->default(0)
                ->after('body')
                ->comment('ユーザーID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scenarios', function (Blueprint $table) {
            $table->removeColumn('user_id');
        });
    }
}
