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
namespace App;

class Controller extends \Controller {
	
	/**
	 * Before
	 * 
	 * Called before the main
	 * action is executed
	 * 
	 * @access	public
	 * @param	mixed	Data to be given
	 * 					to all views
	 */
	public function before()
	{
		// // Migrate to the latest
		// // database schema
		// \Migrate::latest();
		
		return parent::before();
	}
	
	/**
	 * Get Response
	 * 
	 * Gets the response
	 * class property
	 * 
	 * @access	public
	 * @return	Response
	 */
	public function get_response()
	{
		return $this->response;
	}
}