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
		$grid = \Grid::factory(__METHOD__, Model_Orm_Country::find())
					 ->add_column('id', array(
					 	'type'		=> 'number',
						'width'		=> 50,
						// 'header'	=> 'ID', // We don't need thte header, it defaults to the column identifier (the first param in add_column())
					 ))
					 ->add_column('name', array(
					 	'header'	=> 'Override name', // Comment me out if you would like
						'index'		=> 'name',			// I'm also assumed from the column identifier, you could remove me
						'renderer'	=> 'Grid\\MyRenderer',
						'filter'	=> 'Grid\\MyFilter',
					 ))
					 ->add_column('enabled', array(
					 	'type'		=> 'options',
						'options'	=> array(
							1			=> 'Enabled',
							0			=> 'Disabled',
						),
						'width'		=> '80px', // You can use px or just provide an integer
					 ))
					 ->set_uses_ajax(true) // Set me to false not to use ajax
					 ->build();
		
		$this->get_layout()
			 ->set_content(\View::factory('grid/column_types')
								->set_grid($grid));
	}
	
	/**
	 * Testing new grid features
	 */
	public function action_test()
	{
		$grid = \Grid::factory(__METHOD__, Model_Orm_Country::find())
					 ->add_column('id', array(
					 	'width'		=> 50,
					 ))
					 ->add_column('name')
					 ->add_column('enabled', array(
					 	'type'		=> 'options',
						'options'	=> array(
							1			=> 'Enabled',
							0			=> 'Disabled',
						),
					 ))
					 ->set_row_action('grid/view/{id}')
					 ->build();
		
		$this->get_layout()
			 ->set_content(\View::factory('grid/test')
								->set_grid($grid));
	}
}