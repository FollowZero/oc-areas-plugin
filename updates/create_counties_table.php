<?php namespace Plus\Area\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateCountiesTable extends Migration
{
    public function up()
    {
        Schema::create('plus_area_counties', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('city_id')->unsigned()->index();
            $table->boolean('is_enabled')->default(true);
            $table->string('name')->index();
            $table->string('code');
        });
    }

    public function down()
    {
        Schema::dropIfExists('plus_area_counties');
    }

}
