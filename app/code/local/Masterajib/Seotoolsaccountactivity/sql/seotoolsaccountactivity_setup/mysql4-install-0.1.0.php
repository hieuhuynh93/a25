<?php

$installer = $this;

$installer->startSetup();
$installer->run("

-- DROP TABLE IF EXISTS {$this->getTable('seotoolsaccountactivity')};
CREATE TABLE {$this->getTable('seotoolsaccountactivity')} (
  `seoactivity_id` int(11) unsigned NOT NULL auto_increment,
  `customer_id` int(11) unsigned NOT NULL,
  `day` varchar(25) NOT NULL default '',
  `month` varchar(25) NOT NULL default '',
  `year` varchar(25) NOT NULL default '',
  `smallseotools_id` int(11) unsigned NOT NULL,
  `activity` text NOT NULL default '',
  `status` smallint(6) NOT NULL default '0',
  `created_time` datetime NULL,
  `update_time` datetime NULL,
  PRIMARY KEY (`seoactivity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    ");

$installer->endSetup(); 
