<?php
/**
 * Created by RubikIntegration Team.
 * User: vunguyen
 * Date: 6/22/12
 * Time: 7:08 PM
 * Question? Come to our website at http://rubikintegration.com
 */
namespace plugins\riMeta;

class ObjectMetas{
    protected $metas = array();
    public function set($metas){
        $this->metas = $metas;
        return $this;
    }

    public function getByKey($key, $field = 'metas_value'){
        $metas = array();
        foreach($this->metas as $meta)
            if($meta['metas_key'] == $key)
                if(!empty($field))
                    $metas[] = $meta[$field];
                else
                    $metas[] = $meta;

        return count($metas) > 1 ? $metas : $metas[0];
    }
}