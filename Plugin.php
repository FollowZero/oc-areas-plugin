<?php namespace Plus\Area;

use Backend;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
        return [
            'areas' => [
                'label'       => 'plus.area::lang.areas.menu_label',
                'description' => 'plus.area::lang.areas.menu_description',
                'category'    => 'plus.area::lang.plugin.name',
                'icon'        => 'icon-building-o',
                'url'         => Backend::url('plus/area/areas'),
                'order'       => 500,
                'permissions' => ['plus.area.access_settings'],
                'keywords'    => 'province, city, county',
            ],
            'settings' => [
                'label'       => 'plus.area::lang.settings.menu_label',
                'description' => 'plus.area::lang.settings.menu_description',
                'category'    => 'plus.area::lang.plugin.name',
                'icon'        => 'icon-map-signs',
                'class'       => 'Plus\Area\Models\Setting',
                'order'       => 600,
                'permissions' => ['plus.area.access_settings'],
            ]
        ];
    }
}
