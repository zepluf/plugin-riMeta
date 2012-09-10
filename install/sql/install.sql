CREATE TABLE IF NOT EXISTS `metas` (
  `metas_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `objects_id` varchar(32) NOT NULL DEFAULT '',
  `objects_type` varchar(32) NOT NULL DEFAULT '',
  `metas_key` varchar(255) NOT NULL DEFAULT '',
  `metas_value` longtext NOT NULL,
  PRIMARY KEY (`metas_id`)
) ENGINE=MyISAM;