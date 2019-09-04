<?php

$installer = $this;

$installer->startSetup();

$installer->run("

-- DROP TABLE IF EXISTS {$this->getTable('linkanalysis')};
CREATE TABLE {$this->getTable('linkanalysis')} (
  `linkanalysis_id` int(11) unsigned NOT NULL auto_increment,
  `url_type` smallint(6) NOT NULL default '0',
  `filename` varchar(255) NOT NULL default '',
  `url` text NOT NULL default '',
  `status` smallint(6) NOT NULL default '0',
  `customer_id` int(11) unsigned NOT NULL,
  `created_time` datetime NULL,
  `update_time` datetime NULL,
  PRIMARY KEY (`linkanalysis_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    ");

$installer->endSetup(); 
