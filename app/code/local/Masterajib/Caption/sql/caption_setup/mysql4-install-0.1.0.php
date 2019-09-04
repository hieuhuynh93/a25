<?php

$installer = $this;

$installer->startSetup();

$installer->run("

-- DROP TABLE IF EXISTS {$this->getTable('caption')};
CREATE TABLE {$this->getTable('caption')} (
  `caption_id` int(11) unsigned NOT NULL auto_increment,
  `customer_id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL default '',
  `caption_text` text NOT NULL default '',
  `status` smallint(6) NOT NULL default '0',
  `created_time` datetime NULL,
  `update_time` datetime NULL,
  PRIMARY KEY (`caption_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    ");

$installer->endSetup(); 
