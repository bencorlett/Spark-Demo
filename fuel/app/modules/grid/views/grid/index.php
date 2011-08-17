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
	<h2>Introduction</h2>
	<p>
		The spark grid is a dead simple way of getting data out of a database, and building that data into a grid that displays uniform throughout your site, and reduces all the semantics of writing a HTML <code>&lt;table /&gt;</code>. The grid you see on this page is made up of the following code below:
<pre>
// Create an orm query
$query = Model_Orm_Country::find();

// Create a grid with the query
$orm_grid = \Grid::factory(__METHOD__ . 'orm', $query)
                 ->add_column('id', array(
                    'type'      => 'number',
                    'width'     => 50,
                 ))
                 ->add_column('code', array(
                    'width'     => 80,
                 ))
                 ->add_column('name')
                 ->build();
</pre>
	</p>
	<h2 style="margin-top: 50px;">The grid</h2>
	<?=$orm_grid?>
	<h2 style="margin-top: 50px;">The same grid - using just the database class</h2>
	<p>
		The amazing part about the grid is - it can require almost <strong>zero</strong> configuration. Just give it a query, list a bunch of columns to add and it does the rest. Don't like the overhead of the Orm? You can just use the database class! The grid is configured <em>identically</em> to the one above, except the query you give it is as simple as this:
	</p>
<pre style="margin-bottom: 10px;">
// Create a db query
$query = \DB::select('*')
            ->from('countries');
</pre>
	<?=$db_grid?>
	<h2 style="margin-top: 50px;">Stay tuned</h2>
	<p>
		Stay tuned to this page - there is so much documentation coming - this is merely a teaser of the power of the grid. Visit <?=\Html::anchor('https://github.com/bencorlett/Spark', 'https://github.com/bencorlett/Spark')?> to download spark, or <?=\Html::anchor('https://github.com/bencorlett/Spark-Demo', 'https://github.com/bencorlett/Spark-Demo')?> to download the entire source code to this website.
	</p>
	<p>
		This website is running on the development branch of Spark - it's a complete rewrite with performance and consistency in focus, but it's incomplete thus far. It currently doesn't support joining tables (the master branch does), however I will add this functionality in the coming days. There are also many more components to the Spark Fuel Package, present in the master branch, but not in the development branch.
	</p>
	<h2>Where to now?</h2>
	<p>
		Getting confident? Check out <?=\Html::anchor('grid/column_types', 'Column Types')?> and how to use them to make your grid more powerful!
	</p>
	<h4>Any questions? Improvements? Bugs? Pull requests? Want to say hi?</h4>
	<p style="text-align: center;">
		I'd love to hear from you. Really
		<br />
		<?=\Html::anchor('http://www.twitter.com/ben_corlett', '@ben_corlett')?><span style="margin: 0 20px;">|</span><?=\Html::mail_to_safe('bencorlett@me.com', 'bencorlett@me.com')?>
		<br />
		irc.freenode.net - bencorlett
	</p>
</div>