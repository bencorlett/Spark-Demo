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
namespace Grid;

class Model_Orm_Country extends \Orm\Model {
	
	/**
	 * The table name this model uses
	 * 
	 * @var	string
	 */
	protected static $_table_name = 'countries';
	
	/**
	 * The properties this model has
	 * 
	 * @var	array
	 */
	protected static $_properties = array(
		'id',
		'code',
		'name',
		'enabled',
	);
}