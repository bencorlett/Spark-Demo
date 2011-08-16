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
	 * The page title
	 * 
	 * @var	string
	 */
	public $title;
	
	/**
	 * Set Title
	 * 
	 * Sets the title property
	 * 
	 * @access	public
	 * @param	string	Title
	 * @return	App\Controller_Template
	 */
	public function set_title($title)
	{
		$this->title = (string) $title;
		return $this;
	}
	
	/**
	 * Prepend to Title
	 * 
	 * Prepends a string to
	 * the title property
	 * 
	 * @access	public
	 * @param	string	String
	 * @param	string	Separator
	 * @return	App\Controller_Template
	 */
	public function prepend_to_title($string, $separator = null)
	{
		// Work out the after separator
		if ($separator === null) $separator = '-';
		$after = null;
		if ($separator !== false) $after = sprintf(' %s ', (string) $separator);
		
		$this->title = (string) $string . $after . $this->title;
		return $this;
	}
	
	/**
	 * Append to Title
	 * 
	 * Append a string to
	 * the title property
	 * 
	 * @access	public
	 * @param	string	String
	 * @param	string	Separator
	 * @return	App\Controller_Template
	 */
	public function append_to_title($string, $separator = null)
	{
		// Work out the before separator
		if ($separator === null) $separator = '-';
		$before = null;
		if ($separator !== false) $before = sprintf(' %s ', (string) $separator);
		
		$this->title = $this->title . $before . (string) $string;
		return $this;
	}
	
	/**
	 * Get Title
	 * 
	 * Gets the title
	 * 
	 * @access	public
	 * @return	string	Title
	 */
	public function get_title()
	{
		if ( ! $this->title) $this->set_title('Spark Fuel Package');
		return $this->title;
	}
	
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
		// Migrate to the latest
		// database schema
		\Migrate::latest();
		
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