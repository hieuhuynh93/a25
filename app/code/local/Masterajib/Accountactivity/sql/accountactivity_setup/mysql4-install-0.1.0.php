<?php

$installer = $this;

$installer->startSetup();

$installer->run("

-- DROP TABLE IF EXISTS {$this->getTable('accountactivity')};
CREATE TABLE {$this->getTable('accountactivity')} (
  `accountactivity_id` int(11) unsigned NOT NULL auto_increment,
  `customer_id` int(11) unsigned NOT NULL,
  `day` varchar(25) NOT NULL default '',
  `month` varchar(25) NOT NULL default '',
  `year` varchar(25) NOT NULL default '',
  `signin` datetime NULL,
  `signout` datetime NULL,
  `link_analysis` int(11) unsigned NOT NULL,
  `website_audit` int(11) unsigned NOT NULL,
  `keyword_manager` int(11) unsigned NOT NULL,
  `sma` int(11) unsigned NOT NULL,
  `smm` int(11) unsigned NOT NULL,
  `page_builder` int(11) unsigned NOT NULL,
  `video_creator` int(11) unsigned NOT NULL,
  `email_marketing` int(11) unsigned NOT NULL,
  `small_seo_tools` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL default '',
  `activity` text NOT NULL default '',
  `status` smallint(6) NOT NULL default '0',
  `created_time` datetime NULL,
  `update_time` datetime NULL,
  PRIMARY KEY (`accountactivity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    ");

$installer->endSetup(); 
