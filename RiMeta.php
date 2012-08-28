<?php

namespace plugins\riMeta;

use plugins\riCore\PluginCore;
use plugins\riPlugin\Plugin;
//var_dump($riview);die("ss");
class RiMeta extends PluginCore{
    
    public function install(){
        return Plugin::get('riCore.DatabasePatch')->executeSqlFile(file(__DIR__ . '/install/sql/install.sql'));
        return true;
    }
    
    public function uninstall(){
        return Plugin::get('riCore.DatabasePatch')->executeSqlFile(file(__DIR__ . '/install/sql/uninstall.sql'));
        return true;
    }
    
    public function init(){
        if(IS_ADMIN_FLAG)
            if(basename($_SERVER["SCRIPT_FILENAME"]) == 'categories.php'){
                global $autoLoadConfig;               
                $autoLoadConfig[200][] = array('autoType' => 'include', 'loadFile' => __DIR__ . '/lib/observers.php');
            }
    }

    
}