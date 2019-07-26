<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
        $table->increments('id')->unique();
		$table->integer('user_id')->unsigned();
		$table->foreign('user_id')
					  ->references('id')->on('users')
					  ->onDelete('cascade');
        $table->date('request_date')->nullable();
		$table->string('destination', 50)->default('')->nullable();
		$table->string('message', 1500)->default('')->nullable();
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
        Schema::dropIfExists('requests');
    }
}
