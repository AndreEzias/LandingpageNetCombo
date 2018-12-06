<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCpfFieldNetComboTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('net_combo',function (Blueprint $table){
            $table->string('cpf',15)->after('ddd_2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('net_combo',function (Blueprint $table){
            $table->dropColumn('cpf');
        });
    }
}
