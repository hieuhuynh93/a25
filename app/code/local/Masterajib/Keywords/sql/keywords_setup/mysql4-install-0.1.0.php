<?php

$installer = $this;

$installer->startSetup();

$installer->run("

-- DROP TABLE IF EXISTS {$this->getTable('keywords')};
CREATE TABLE {$this->getTable('keywords')} (
  `keywords_id` int(11) unsigned NOT NULL auto_increment,
  `keyword` varchar(255) NOT NULL default '',
  `linkdetails_id` int(11) unsigned NOT NULL,
  `keyword_websites` text NOT NULL default '',
  `all_keywords` text NOT NULL default '',
  `suggested_keywords` text NOT NULL default '',
  `status` smallint(6) NOT NULL default '0',
  `created_time` datetime NULL,
  `update_time` datetime NULL,
  PRIMARY KEY (`keywords_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    ");

$installer->endSetup(); 
