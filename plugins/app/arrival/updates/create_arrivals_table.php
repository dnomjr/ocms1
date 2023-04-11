<?php namespace App\Arrival\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateArrivalsTable extends Migration
{
    public function up()
    {
        Schema::create('arrivals', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->timestamp('arrival');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('arrivals');
    }
}
