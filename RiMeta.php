<?php

namespace plugins\riMeta;

use plugins\riCore\PluginCore;
use plugins\riPlugin\Plugin;
use plugins\riCore\Event;

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
            if(basename($_SERVER["SCRIPT_FILENAME"]) == 'categories.php')
                Plugin::get('dispatcher')->addListener(\plugins\riCore\Events::onPageEnd, array($this, 'onPageEnd'));
    }

    public function onPageEnd(Event $event){
        $event->setContent(str_replace('</body>', Plugin::get('view')->render('riMeta::backend/_add_link.php') . '</body>', $event->getContent()));
    }
}