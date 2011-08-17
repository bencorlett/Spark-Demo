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

class MyRenderer extends \Grid_Column_Renderer_Text {
	
	/**
	 * Render
	 * 
	 * Renders a cell and populates
	 * it's rendered value
	 * 
	 * @access	public
	 * @param	Spark\Grid_Column_Cell	Cell
	 * @return	Grid\MyRenderer
	 */
	public function render(\Grid_Column_Cell $cell)
	{
		// We need to transform the
		// original value into a rendererd
		// value
		$value = strrev($cell->get_original_value());
		
		// Set the rendered value to the value we've rendered
		$cell->set_rendered_value($value);
		
		return $this;
	}
}