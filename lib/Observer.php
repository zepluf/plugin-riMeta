<?php
namespace plugins\riMeta;
use plugins\riPlugin\Plugin;

class Observer extends \base
{
	function __construct(){
		global $zco_notifier;
		
		$zco_notifier->attach($this,array('END_CATEGORIES_ADMIN'));
                
	}
	
	function update($callingClass, $notifier, $paramsArray)
	{
            //die("yy");
            echo Plugin::get('view')->render('riMeta::backend/__addLinkMeta.php');
                
	}
}