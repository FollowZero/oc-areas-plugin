<?php namespace Plus\Area\Updates;

use October\Rain\Database\Updates\Seeder;
use Plus\Area\Models\City;

class SeedCitiesTable extends Seeder
{
    public function run()
    {
        $json=file_get_contents(__DIR__.'/city.json');
        $arr=json_decode($json,true);
        City::insert($arr);
    }

}
