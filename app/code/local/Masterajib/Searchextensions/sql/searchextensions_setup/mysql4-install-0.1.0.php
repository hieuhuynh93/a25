<?php

$installer = $this;

$installer->startSetup();

$installer->run("

-- DROP TABLE IF EXISTS {$this->getTable('searchextensions')};
CREATE TABLE {$this->getTable('searchextensions')} (
  `searchextensions_id` int(11) unsigned NOT NULL auto_increment,
  `country_name` varchar(255) NOT NULL default '',
  `country_code` varchar(255) NOT NULL default '',
  `google_extension` varchar(255) NOT NULL default '',
  `yahoo_extension` varchar(255) NOT NULL default '',
  `bing_extension` varchar(255) NOT NULL default '',
  `yandex_extension` varchar(255) NOT NULL default '',
  `status` smallint(6) NOT NULL default '0',
  `created_time` datetime NULL,
  `update_time` datetime NULL,
  PRIMARY KEY (`searchextensions_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    ");

$installer->endSetup(); 
