<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use MostafaKamel\AdvertiseringSystem\Models\Ad;

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
            $table->integer('category_id')->index();
            $table->integer('user_id')->index();
            $table->date('start_date');
            $table->enum('status', [Ad::FREE, Ad::PAID])->default(Ad::FREE);
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
