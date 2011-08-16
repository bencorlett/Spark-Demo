<?php
/**
 * Spark Fuel Package By Ben Corlett
 * 
 * Spark - Set your fuel on fire!
 * 
 * The Spark Fuel Package is an open-source
 * fuel package consisting of several 'widgets'
 * engineered to make developing various
 * web-based systems easier and quicker.
 * 
 * @package    Fuel
 * @subpackage Spark
 * @version    1.0
 * @author     Ben Corlett (http://www.bencorlett.com)
 * @license    MIT License
 * @copyright  (c) 2011 Ben Corlett
 * @link       http://spark.bencorlett.com
 */
namespace Fuel\Migrations;

class Create_Sessions {
	
	public function up()
	{
		\DB::query("
		
			CREATE TABLE IF NOT EXISTS `sessions` (
			  `session_id` varchar(40) NOT NULL,
			  `previous_id` varchar(40) NOT NULL,
			  `user_agent` text NOT NULL,
			  `ip_address` char(32) NOT NULL DEFAULT '',
			  `ip_hash` char(32) NOT NULL DEFAULT '',
			  `created` int(10) unsigned NOT NULL DEFAULT '0',
			  `updated` int(10) unsigned NOT NULL DEFAULT '0',
			  `payload` longtext NOT NULL,
			  PRIMARY KEY (`session_id`),
			  UNIQUE KEY `PREVIOUS` (`previous_id`)
			) ENGINE=INNODB DEFAULT CHARSET=utf8;
		
		")->execute();
	}
	
	public function down()
	{
		\DBUtil::drop_table('sessions');
	}
}