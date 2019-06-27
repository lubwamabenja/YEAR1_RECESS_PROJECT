<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) { 
            $table->increments('id');
            $table->string('memberName',30);
            $table->string('memberID',30);
            $table->string('enrollmentDate',30);
            $table->string('memberRecommender',30);
            $table->string('memberGender',12);
            $table->string('enrolledBy',30);
            $table->string('districtName',30);
            $table->integer('recommendedMembers');
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
        Schema::dropIfExists('members');
    }
}
