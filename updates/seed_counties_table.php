<?php namespace Plus\Area\Updates;

use October\Rain\Database\Updates\Seeder;
use Plus\Area\Models\County;

class SeedCountiesTable extends Seeder
{
    public function run()
    {
        $json=file_get_contents(__DIR__.'/county.json');
        $arr=json_decode($json,true);
        County::insert($arr);
    }

}
