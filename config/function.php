<?php
function list_meta(){
    global  $db;
    $data['new'] = "Enter New";
    $list = $db->Execute("select DISTINCT metas_key from " .TABLE_METAS);
    //var_dump($list);die();
    while (!$list->EOF){
        $data[$list->fields['metas_key']] = $list->fields['metas_key'];
        $list->MoveNext();
    }
    return $data;
}

