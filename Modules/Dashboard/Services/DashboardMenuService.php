<?php

namespace Modules\Dashboard\Services;

use Nwidart\Modules\Facades\Module;

class DashboardMenuService
{
    public static function readModulesConfig(): array
    {
        $moduleConfigs = [];
        $enableModules = array_keys(Module::allEnabled());


        foreach ($enableModules as $module) {
            $menuOptions = config(strtolower($module) . '.menu');

            if (!is_null($menuOptions)) {
                $moduleConfigs[$module] = $menuOptions;
            }
        }

        return self::sortLevelOne($moduleConfigs);
    }


    private static function sortLevelOne(array $configs): array
    {
        usort($configs, static function ($itemOne, $itemTwo) {
           if ($itemOne['order'] === $itemTwo['order']) {
               return 0;
           }

           return $itemOne['order'] - $itemTwo['order'];
        });

        return self::reformatConfigs($configs);
    }


    private static function sortLevelTwo()
    {
        //
    }


    private static function sortLevelThree()
    {
        //
    }



    private static function reformatConfigs($configs): array
    {
        $output = [];

        foreach ($configs as $module) {
            $output[$module['module']] = $module;
        }

        return $output;
    }

}
