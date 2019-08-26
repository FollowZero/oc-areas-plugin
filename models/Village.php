<?php namespace Plus\Area\Models;

use Model;

/**
 * Model
 */
class Village extends Model
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
    public $table = 'plus_area_villages';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    protected static $nameList = [];

    public static function getNameList($townId)
    {
        if (isset(self::$nameList[$townId])) {
            return self::$nameList[$townId];
        }

        return self::$nameList[$townId] = self::whereTownId($townId)->lists('name', 'id');
    }
}
