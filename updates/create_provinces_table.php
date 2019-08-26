<?php namespace Plus\Area\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateProvincesTable extends Migration
{
    public function up()
    {
        Schema::create('plus_area_provinces', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->boolean('is_enabled')->default(true);
            $table->string('name')->index();
            $table->string('code');
        });
    }

    public function down()
    {
        Schema::dropIfExists('plus_area_provinces');
    }

}
