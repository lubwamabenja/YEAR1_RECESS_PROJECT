<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {  
            $table->increments('id');
            $table->string('agentName',30); 
            $table->string('agentUsername',30);
            $table->string('signatre',2);
            $table->string('districtName',30);
            $table->string('agentHead',30);
            $table->integer('wageUnits');  
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
        Schema::dropIfExists('agents');
    }
}
