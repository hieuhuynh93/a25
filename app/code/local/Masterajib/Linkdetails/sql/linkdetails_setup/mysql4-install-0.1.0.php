<?php

$installer = $this;

$installer->startSetup();

$installer->run("

-- DROP TABLE IF EXISTS {$this->getTable('linkdetails')};
CREATE TABLE {$this->getTable('linkdetails')} (
  `linkdetails_id` int(11) unsigned NOT NULL auto_increment,
  `linkanalysis_id` int(11) unsigned NOT NULL,
  `customer_id` int(11) unsigned NOT NULL,
  `related_url` text NOT NULL default '',
  `status` smallint(6) NOT NULL default '0',
  `robot_txt` smallint(6) NOT NULL default '0',
  `page_size` varchar(30) NOT NULL default '',
  `load_time` varchar(30) NOT NULL default '',
  `url_type` smallint(6) NOT NULL default '0',
  `analysis_status` smallint(6) NOT NULL default '0',
  `page_authority` varchar(30) NOT NULL default '',
  `domain_authority` varchar(30) NOT NULL default '',
  `follow` varchar(30) NOT NULL default '',
  `do_follow` varchar(30) NOT NULL default '',
  `link_juice` varchar(30) NOT NULL default '',
  `no_of_external_link` varchar(30) NOT NULL default '',
  `alexa_ranking` int(11) unsigned NOT NULL,
  `meta_title` text NOT NULL default '',
  `meta_keywords` text NOT NULL default '',
  `meta_description` text NOT NULL default '',
  `created_time` datetime NULL,
  `update_time` datetime NULL,
  PRIMARY KEY (`linkdetails_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    ");

$installer->endSetup(); 
