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
?>
<div class="content">
	<h2>Column Types</h2>
	<p>
		The grid supports many column types, as seen in the code below
	</p>
<pre>
$grid = \Grid::factory(__METHOD__, Model_Orm_Country::find())
             ->add_column('id', array(
                 'type'        => 'number',
                'width'        => 50,
                // 'header'    => 'ID', // We don't need thte header, it defaults to the column identifier (the first param in add_column())
             ))
             ->add_column('name', array(
                 'header'    => 'Override name', // Comment me out if you would like
                'index'        => 'name'         // I'm also assumed from the column identifier, you could remove me
             ))
             ->add_column('enabled', array(
                 'type'        => 'options',
                'options'    => array(
                    1            => 'Enabled',
                    0            => 'Disabled',
                ),
                'width'        => '80px', // You can use px or just provide an integer
             ))
             ->set_uses_ajax(true) // Set me to false not to use ajax
             ->build();
</pre>
	<?=$grid?>
</div>