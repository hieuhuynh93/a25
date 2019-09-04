<?php

$installer = $this;

$installer->startSetup();

$installer->run("

-- DROP TABLE IF EXISTS {$this->getTable('graph')};
CREATE TABLE {$this->getTable('graph')} (
  `graph_id` int(11) unsigned NOT NULL auto_increment,
  `linkanalysis_id` int(11) unsigned NOT NULL,
  `linkdetails_id` int(11) unsigned NOT NULL,
  `element_name` text NOT NULL default '',
  `element_type` smallint(6) NOT NULL default '0',
  `google_rank` int(11) unsigned NOT NULL,
  `yahoo_rank` int(11) unsigned NOT NULL,
  `bing_rank` int(11) unsigned NOT NULL,
  `yandex_rank` int(11) unsigned NOT NULL,
  `day` varchar(30) NOT NULL default '',
  `month` varchar(30) NOT NULL default '',
  `year` varchar(30) NOT NULL default '',
  `status` smallint(6) NOT NULL default '0',
  `created_time` datetime NULL,
  `update_time` datetime NULL,
  PRIMARY KEY (`graph_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    ");

$installer->endSetup(); 
