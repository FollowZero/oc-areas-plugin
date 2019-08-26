<?php namespace Plus\Area\Controllers;

use Backend\Classes\Controller;

use Lang;
use Flash;
use Backend;
use BackendMenu;
use Illuminate\Support\Facades\DB;
use System\Classes\SettingsManager;

use Plus\Area\Models\Province;

class Areas extends Controller
{
    public $implement = [
        'Backend\Behaviors\ListController',
        'Backend\Behaviors\FormController',
        'Backend\Behaviors\RelationController'
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

    public function onLoadDisableForm()
    {
        try {
            $this->vars['checked'] = post('checked');
        }
        catch (Exception $ex) {
            $this->handleError($ex);
        }

        return $this->makePartial('disable_form');
    }

    public function onDisableLocations()
    {
        $enable = post('enable', false);

        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {

            foreach ($checkedIds as $objectId) {
                if (!$object = Province::find($objectId)) {
                    continue;
                }

                $object->is_enabled = $enable;
                $object->save();
            }

        }

        if ($enable) {
            Flash::success(Lang::get('plus.area::lang.areas.enable_success'));
        }
        else {
            Flash::success(Lang::get('plus.area::lang.areas.disable_success'));
        }

        return Backend::redirect('plus/area/areas');
    }
}
