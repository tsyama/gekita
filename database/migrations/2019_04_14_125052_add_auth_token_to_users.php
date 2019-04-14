<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAuthTokenToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('access_token', 100)
                ->unique()
                ->nullable()
                ->after('email')
                ->comment('アクセストークン');
            $table->dropColumn('email_verified_at');
            $table->dropColumn('remember_token');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('access_token');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();

        });
    }
}
