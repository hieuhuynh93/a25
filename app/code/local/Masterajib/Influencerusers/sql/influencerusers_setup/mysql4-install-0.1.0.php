<?php

$installer = $this;

$installer->startSetup();

$installer->run("

-- DROP TABLE IF EXISTS {$this->getTable('influencerusers')};
CREATE TABLE {$this->getTable('influencerusers')} (
  `influencerusers_id` int(11) unsigned NOT NULL auto_increment,
  `customer_id` smallint(6) NOT NULL default '0',
  `platform` varchar(255) NOT NULL default '',
  `username` varchar(255) NOT NULL default '',
  `password` varchar(255) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `name` varchar(255) NOT NULL default '',
  `authorized_key` text NOT NULL default '',
  `user_type` smallint(6) NOT NULL default '0',
  `status` smallint(6) NOT NULL default '0',
  `created_time` datetime NULL,
  `update_time` datetime NULL,
  PRIMARY KEY (`influencerusers_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    ");

$installer->endSetup(); 
