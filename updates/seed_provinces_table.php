<?php namespace Plus\Area\Updates;

use October\Rain\Database\Updates\Seeder;
use Plus\Area\Models\Province;

class SeedProvincesTable extends Seeder
{
    public function run()
    {
        $json=file_get_contents(__DIR__.'/province.json');
        $arr=json_decode($json,true);
        Province::insert($arr);
    }

}
