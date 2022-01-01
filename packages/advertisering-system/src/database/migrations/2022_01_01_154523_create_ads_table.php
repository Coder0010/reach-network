<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('id', 11)->key()->unsigned(false);
            $table->string('name');
            $table->text('description');
            $table->text('additional_data')->nullable();// Saved as json
            $table->integer('category_id')->index();
            $table->integer('user_id')->index();
            $table->date('start_date');
            $table->enum('status', ['free', 'paid'])->default('paid');
            $table->timestamps();

            $table->foreign('category_id', 'category_id_fk')->references('id')->on('filters')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
}
