<?php namespace Plus\Area\Models;

use Model;

/**
 * Model
 */
class Province extends Model
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
    public $table = 'plus_area_provinces';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     * @var array Relations
     */
    public $hasMany = [
        'cities' => ['Plus\Area\Models\City']
    ];

    /**
     * @var array Cache for nameList() method
     */
    protected static $nameList = null;

    public static function getNameList()
    {
        if (self::$nameList) {
            return self::$nameList;
        }

        return self::$nameList = self::isEnabled()->orderBy('id', 'desc')->lists('name', 'id');
    }
    public function scopeIsEnabled($query)
    {
        return $query->where('is_enabled', true);
    }

}
