<?php

$installer = $this;

$installer->startSetup();

$installer->run("

-- DROP TABLE IF EXISTS {$this->getTable('bulkposting')};
CREATE TABLE {$this->getTable('bulkposting')} (
  `bulkposting_id` int(11) unsigned NOT NULL auto_increment,
  `customer_id` int(11) unsigned NOT NULL,
  `post_type` varchar(60) NOT NULL default '',
  `filename` varchar(255) NOT NULL default '',
  `total_post` int(11) unsigned NOT NULL,
  `schedule_post` int(11) unsigned NOT NULL,
  `status` smallint(6) NOT NULL default '0',
  `created_time` datetime NULL,
  `update_time` datetime NULL,
  PRIMARY KEY (`bulkposting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    ");

$installer->endSetup(); 
