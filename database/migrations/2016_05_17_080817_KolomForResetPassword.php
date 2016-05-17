<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KolomForResetPassword extends Migration
{

    public function up()
    {
        Schema::table('users', function(Blueprint $kolom){
            $kolom->string('code');
            $kolom->string('password_tmp');
        });
    }


    public function down()
    {
        Schema::table('users', function(Blueprint $kolom){
            $kolom->dropColumn('code');
            $kolom->dropColumn('password_tmp');
        });
    }
}
