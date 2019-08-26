<?php namespace Plus\Area\Behaviors;

use Db;
use Plus\Area\Models\City;
use Plus\Area\Models\Province;
use Plus\Area\Models\County;
use Plus\Area\Models\Town;
use Plus\Area\Models\Village;
use System\Classes\ModelBehavior;
use ApplicationException;


/**
 * Location model extension
 *
 * Adds Country and State relations to a model
 *
 * Usage:
 *
 * In the model class definition:
 *
 *   public $implement = ['RainLab.Location.Behaviors.LocationModel'];
 *
 */
class AreaModel extends ModelBehavior
{
    /**
     * Constructor
     */
    public function __construct($model)
    {
        parent::__construct($model);


        $model->belongsTo['province'] = ['Plus\Area\Models\Province'];
        $model->belongsTo['city']   = ['Plus\Area\Models\City'];
        $model->belongsTo['county'] = ['Plus\Area\Models\County'];
        $model->belongsTo['town']   = ['Plus\Area\Models\Town'];
        $model->belongsTo['village'] = ['Plus\Area\Models\Village'];
    }




    public function getProvinceOptions()
    {
        return Province::getNameList();
    }

    public function getCityOptions()
    {
        return City::getNameList($this->model->province_id);
    }

    public function getCountyOptions()
    {
        return County::getNameList($this->model->city_id);
    }

    public function getTownOptions()
    {
        return Town::getNameList($this->model->county_id);
    }

    public function getVillageOptions()
    {
        return Village::getNameList($this->model->town_id);
    }


}
