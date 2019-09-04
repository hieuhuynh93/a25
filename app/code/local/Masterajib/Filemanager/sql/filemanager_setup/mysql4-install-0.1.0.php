<?php

$installer = $this;

$installer->startSetup();

$installer->run("

-- DROP TABLE IF EXISTS {$this->getTable('filemanager')};
CREATE TABLE {$this->getTable('filemanager')} (
  `filemanager_id` int(11) unsigned NOT NULL auto_increment,
`customer_id` int(11) unsigned NOT NULL,
`category_ids` int(11) unsigned NOT NULL,
  `upload_type` varchar(255) NOT NULL default '',
  `filename` varchar(255) NOT NULL default '',
  `customer_permission` varchar(255) NOT NULL default '',
  `content` text NOT NULL default '',
  `status` smallint(6) NOT NULL default '0',
  `created_time` datetime NULL,
  `update_time` datetime NULL,
  PRIMARY KEY (`filemanager_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    ");

$installer->endSetup(); 
