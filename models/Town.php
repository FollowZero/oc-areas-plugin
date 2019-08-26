<?php namespace Plus\Area\Models;

use Model;

/**
 * Model
 */
class Town extends Model
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
    public $table = 'plus_area_towns';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    public $hasMany = [
        'villages' => ['Plus\Area\Models\Village']
    ];

    protected static $nameList = [];

    public static function getNameList($countyId)
    {
        if (isset(self::$nameList[$countyId])) {
            return self::$nameList[$countyId];
        }

        return self::$nameList[$countyId] = self::whereCountyId($countyId)->lists('name', 'id');
    }
}
