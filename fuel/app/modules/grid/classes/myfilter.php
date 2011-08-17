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

class MyFilter extends \Grid_Column_Filter_Text {
	
	/**
	 * Translate
	 * 
	 * Translates a user value
	 * into a real value
	 * 
	 * @access	public
	 * @param	Spark\Grid_Column_Filter	Filter
	 * @return	Grid\MyFilter
	 */
	public function translate(\Grid_Column_Filter $filter)
	{
		// The value the user typed in
		$user_value = $filter->get_user_value();
		
		// We want to convert it back to
		// somethign that might be found
		// in the database
		$value = strrev($user_value);
		
		// We don't need to manipulate anything
		$filter->set_real_value($value);
		
		return $this;
	}
}