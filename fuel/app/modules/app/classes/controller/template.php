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

class Controller_Template extends \Controller_Template {
	
	/**
	 * Template constants
	 * 
	 * @constant
	 */
	const TEMPLATE_DEFAULT = 'app::template/default';
	
	/**
	 * The default template
	 * 
	 * @var	string
	 */
	public $template = self::TEMPLATE_DEFAULT;
	
	/**
	 * Layout constants
	 * 
	 * @constant
	 */
	const LAYOUT_ONE_COLUMN = 'app::layout/one_column';
	
	/**
	 * The default layout
	 * 
	 * @var	string
	 */
	public $layout = self::LAYOUT_ONE_COLUMN;
	
	/**
	 * The page title
	 * 
	 * @var	string
	 */
	public $title;
	
	/**
	 * The page section
	 * 
	 * @var	string
	 */
	public $section;
	
	/**
	 * Set Section
	 * 
	 * Sets the section of the
	 * application
	 * 
	 * @access	public
	 * @return	App\Controller_Template
	 */
	public function set_section($section)
	{
		$this->section = (string) $section;
		return $this;
	}
	
	/**
	 * Get Section
	 * 
	 * Gets the section of the
	 * application
	 * 
	 * @access	public
	 * @return	string	Section
	 */
	public function get_section()
	{
		return $this->section;
	}
	
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
	 * Set Template
	 * 
	 * Sets the template
	 * to be used in this
	 * request
	 * 
	 * @access	public
	 * @param	string	Template
	 * @return	App\Controller_Template
	 */
	public function set_template($template = null)
	{
		// Set the default template if none
		// is provided
		if ( ! $template) $template = self::TEMPLATE_DEFAULT;
		
		// Set the template
		$this->template = \View::factory($template);
		
		// Chainable
		return $this;
	}
	
	/**
	 * Get Template
	 * 
	 * Gets the template
	 * that's used in
	 * this request
	 * 
	 * @access	public
	 * @return	View
	 */
	public function get_template()
	{
		return $this->template;
	}
	
	/**
	 * Set Layout
	 * 
	 * Sets the layout to
	 * be used in this
	 * request
	 * 
	 * @access	public
	 * @param	string	Layout
	 * @return	App\Controller_Template
	 */
	public function set_layout($layout = null)
	{
		// Set the default layout if none
		// is provided
		if ( ! $layout) $layout = self::LAYOUT_ONE_COLUMN;
		
		// Set the layout
		$this->layout = \View::factory($layout);
		
		// Chainable
		return $this;
	}
	
	/**
	 * Get Layout
	 * 
	 * Gets the layout
	 * that's used in
	 * this request
	 * 
	 * @access	public
	 * @return	View
	 */
	public function get_layout()
	{
		return $this->layout;
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
	public function before($data = null)
	{
		// Create the layout
		if ($this->auto_render === true) $this->layout = \View::factory($this->layout);
		
		// Migrate to the latest
		// database schema
		\Migrate::latest();
		
		return parent::before($data);
	}
	
	/**
	 * After
	 * 
	 * Called after the main
	 * action is executed
	 * 
	 * @access	public
	 */
	public function after()
	{
		// Attach the layout to the template
		if ($this->auto_render === true)
		{
			$this->get_template()->set_layout($this->get_layout())
								 ->set_title($this->get_title())
								 ->set_section($this->get_section());
		}

		return parent::after();
	}
}