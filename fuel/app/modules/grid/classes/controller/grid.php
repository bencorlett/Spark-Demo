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

class Controller_Grid extends \App\Controller_Template {
	
	public function before($data = null)
	{
		// Set the section
		$this->set_section('Grid');
		
		return parent::before($data);
	}
	
	public function action_index()
	{
		// Create a view
		$view = \View::factory('grid/index');
		
		// Create an orm query
		$query = Model_Orm_Country::find();
		
		// Create a grid with the query
		$orm_grid = \Grid::factory(__METHOD__ . 'orm', $query)
						 ->add_column('id', array(
						 	'type'		=> 'number',
							'width'		=> 50,
						 ))
						 ->add_column('code', array(
						 	'width'		=> 80,
						 ))
						 ->add_column('name')
					 	 ->build();
		
		// Attach to view
		$view->set_orm_grid($orm_grid);
		
		// Create a db query
		$query = \DB::select('*')
					->from('countries');
		
		// Create a grid with the query
		$db_grid = \Grid::factory(__METHOD__ . 'db', $query)
						->add_column('id', array(
							'type'		=> 'number',
							'width'		=> 50,
						))
						->add_column('code', array(
							'width'		=> 80,
						))
						->add_column('name')
					 	->build();
		
		// Attach to view
		$view->set_db_grid($db_grid);
		
		// Attach to layout
		$this->get_layout()
			 ->set_content($view);
	}
	
	public function action_column_types()
	{
		
	}
}