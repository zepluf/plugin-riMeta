<?php
/**
 * Created by RubikIntegration Team.
 * User: vunguyen
 * Date: 6/22/12
 * Time: 7:08 PM
 * Question? Come to our website at http://rubikintegration.com
 */
namespace plugins\riMeta;

class Metas{
    protected $metas = array();
    public function findByObjectsId($objects_id, $objects_type){

        $key = $objects_id . '_' . $objects_type;
        if(!isset($this->metas['key'][$key])){
            global $db;
            $sql = "SELECT * FROM " . TABLE_METAS . " WHERE objects_id = :objects_id AND objects_type = :objects_type";
            $sql = $db->bindVars($sql, ':objects_id', $objects_id, 'integer');
            $sql = $db->bindVars($sql, ':objects_type', $objects_type, 'string');

            $result = $db->Execute($sql);
            $this->metas['key'][$key] = array();
            if($result->RecordCount() > 0){
                while(!$result->EOF){
                    $this->metas['id'][$result->fields['id']] = $result->fields;
                    $this->metas['key'][$key][] = $result->fields;
                    $result->MoveNext();
                }
            }
        }

        return \plugins\riPlugin\Plugin::get('riMeta.ObjectMetas')->set($this->metas['key'][$key]);
    }

    public function findById($metas_id){
        if(!isset($this->metas['id'][$metas_id])){
            global $db;
            $sql = "SELECT * FROM " . TABLE_METAS . " WHERE id = :metas_id";
            $sql = $db->bindVars($sql, ':metas_id', $metas_id, 'integer');
            $result = $db->Execute($sql);
            $this->metas['id'][$metas_id] = false;
            if($result->RecordCount() > 0){
                $this->metas['id'][$metas_id] = $result->fields;
            }
        }

        return $this->metas['id'][$metas_id] !== false ? \plugins\riPlugin\Plugin::get('riMeta.Meta')->setArray($this->metas['id'][$metas_id]) : false;
    }
}