<?php namespace Plus\Area\Models;

use Model;

/**
 * Model
 */
class City extends Model
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
    public $table = 'plus_area_cities';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     * @var array Relations
     */
    public $hasMany = [
        'counties' => ['Plus\Area\Models\County']
    ];

    protected static $nameList = [];

    public static function getNameList($provinceId)
    {
        if (isset(self::$nameList[$provinceId])) {
            return self::$nameList[$provinceId];
        }

        return self::$nameList[$provinceId] = self::whereProvinceId($provinceId)->lists('name', 'id');
    }
}
