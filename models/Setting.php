<?php namespace Plus\Area\Models;

use Model;

/**
 * Model
 */
class Setting extends Model
{


    public $implement = ['System.Behaviors.SettingsModel'];

    public $settingsCode = 'area_settings';
    public $settingsFields = 'fields.yaml';
}
