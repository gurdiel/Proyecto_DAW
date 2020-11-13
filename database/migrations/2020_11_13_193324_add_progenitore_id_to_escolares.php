<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProgenitoreIdToEscolares extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('escolares', function (Blueprint $table) {
            //
            $table->integer('progenitore_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('escolares', function (Blueprint $table) {
            //
            $table->dropColumn('progenitore_id');

        });
    }
}
