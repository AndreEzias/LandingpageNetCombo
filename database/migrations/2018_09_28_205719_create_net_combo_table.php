<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNetComboTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('net_combo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',250)->nullable();
            $table->string('email',250);
            $table->string('telefone',9)->nullable();
            $table->string('ddd',2)->nullable();
            $table->string('telefone_2',9)->nullable();
            $table->string('ddd_2',2)->nullable();
            $table->string('cep',9)->nullable();
            $table->string('address',250);
            $table->string('city',150);
            $table->string('state',2);
            $table->string('complement', 150);
            $table->string('number',5);
            $table->boolean('cobertura')->nullable();
            $table->string('sent_to')->nullable()->comment('IBGE');
            $table->tinyInteger('status')->default(2)->comment('0 = invalid | 1 = Valid | 2 = Waiting');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('net_combo');
    }
}
