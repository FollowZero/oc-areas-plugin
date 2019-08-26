<?php namespace Plus\Area\Models;

use Model;

/**
 * Model
 */
class County extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'plus_area_counties';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $hasMany = [
        'towns' => ['Plus\Area\Models\Town']
    ];

    protected static $nameList = [];

    public static function getNameList($cityId)
    {
        if (isset(self::$nameList[$cityId])) {
            return self::$nameList[$cityId];
        }

        return self::$nameList[$cityId] = self::whereCityId($cityId)->lists('name', 'id');
    }
}
