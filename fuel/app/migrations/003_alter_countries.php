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

class Alter_Countries {
	
	public function up()
	{
		\DB::query("
		
			ALTER TABLE `countries`
			ADD COLUMN `enabled` TINYINT(1) NOT NULL DEFAULT 1;
		
		")->execute();
		
		// Let's randomise what's
		// enabled and what's not
		$countries = \Grid\Model_Orm_Country::find('all');
		
		// Options
		$enabled = array(0, 1);
		
		foreach ($countries as $country)
		{
			$country->enabled = $enabled[array_rand($enabled)];
			$country->save();
		}
	}
	
	public function down()
	{
		\DBUtil::drop_table('countries');
	}
}