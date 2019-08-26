<?php namespace Plus\Area\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Plus\Area\Models\Setting as AreaSetting;
use System\Classes\SettingsManager;

class Towns extends Controller
{
    public $implement = [
        'Backend\Behaviors\ListController',
        'Backend\Behaviors\FormController',
        'Backend\Behaviors\RelationController',
    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $relationConfig = 'config_relation.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('October.System', 'system', 'settings');
        SettingsManager::setContext('Plus.Area', 'areas');
    }
    public function villageStatus()
    {
        return AreaSetting::get('village_status');
    }
}
