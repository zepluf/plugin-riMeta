<?php
namespace plugins\riMeta;

use plugins\riCore\PluginCore;
use plugins\riPlugin\Plugin;

class RiMeta extends PluginCore{
    
    public function install(){
        return Plugin::get('riCore.DatabasePatch')->executeSqlFile(file(__DIR__ . '/install/sql/install.sql'));
        return true;
    }
    
    public function uninstall(){
        return Plugin::get('riCore.DatabasePatch')->executeSqlFile(file(__DIR__ . '/install/sql/uninstall.sql'));
        return true;
    }
}