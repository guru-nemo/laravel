<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTuristsTab extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('turists', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('user_id')->unique()->unsigned()->index();
		//$table->foreign('user_id')->references('id')->on('users');
		$table->foreign('user_id')
					  ->references('id')->on('users')
					  ->onDelete('cascade');
        $table->string('name', 50)->default('')->nullable();
		$table->string('surname', 100)->default('')->nullable();
		$table->string('second_name',100)->default('')->nullable();
		$table->date('birth_date')->nullable();
		$table->string('tel', 20)->default(null)->nullable();
		$table->bigInteger('passport')->default(null)->nullable();
		$table->date('passport_date')->nullable();
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
        Schema::dropIfExists('turists');
    }
}
