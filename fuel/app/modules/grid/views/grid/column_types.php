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
	<?=\Html::anchor('/', '&laquo; Back to overview')?>
	<h2>Column Types</h2>
	<p>
		The grid supports many column types, as seen in the code below:
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
                'index'        => 'name',            // I'm also assumed from the column identifier, you could remove me
                'renderer'    => 'Grid\\MyRenderer',
                'filter'    => 'Grid\\MyFilter',
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
	<h2>Renderers</h2>
	<p>
		In the above code you will see we've not specified a <strong>type</strong> for a grid column, but rather a <strong>filter</strong> and <strong>renderer</strong>. If you look in the spark source code you'll see that <code>Spark\Grid_Column::get_renderer()</code> just looks at the cell type and fills out a renderer based on the column type. In <code>Spark\Grid_Column_Filter::get_filter()</code> it does the same thing with filters. This means that you could provide a type of column, but override the <strong>filter</strong> and <strong>renderer</strong>. Chances are you would override both of them, because the user will put in the filter something they expect to see come out of the renderer. They're exact opposites.
	</p>
	<p>
		You will notice that I have overridden the renderer in the source code above to be <code>Grid\MyRenderer</code>. How do you implement it? Quite easily actually:
	</p>
<pre>
namespace Grid;

class MyRenderer extends \Grid_Column_Renderer_Text {

    /**
     * Render
     * 
     * Renders a cell and populates
     * it's rendered value
     * 
     * @access    public
     * @param     Spark\Grid_Column_Cell    Cell
     * @return    Grid\MyRenderer
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
</pre>
	<p>
		To make a renderer, you must inherit off <code>Spark\Grid_Column_Renderer_Abstract</code> (The driver). In this case we're inheriting of <code>Spark\Grid_Column_Renderer_Text</code> who inherits off the driver so that's okay.
		There is only one method to implement, namely, <code>render()</code>. You get given the actualy table cell object, and you just need to call a method <strong>set_rendered_value()</strong>. Whatever is put in there is put in the table cell on the grid. You have access to the value that came out of the database by calling <strong>get_original_value()</strong>, and it's up to you what you do with it. In this case, we've just reversed the string.
	</p>
	<h2>Filters</h2>
	<p>
		As outlined above, filters are the exact opposite of renderers. They have just one more task though, to build the table cell you see at the top of each column - the filter inputs. Take a look at the filter code below that we used on the grid:
	</p>
<pre>
namespace Grid;

class MyFilter extends \Grid_Column_Filter_Text {

    /**
     * Translate
     * 
     * Translates a user value
     * into a real value
     * 
     * @access    public
     * @param     Spark\Grid_Column_Filter    Filter
     * @return    Grid\MyFilter
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
</pre>
	<p>
		Once again, we've been given an object, and we want to manipulate the user's value back to a real value (or the value that will be queried against our database). And once again, we've just reversed the string the user has put in and set it as the real value. We didn't override the second task a filter has - building the table cell at the top of each column. Let's have a look at another filter that does it - <code>Spark\Grid_Column_Filter_Options</code>. The method to implement to override the rendering of the table cell is <strong>render</strong>, and once again you're given the filter object:
	</p>
<pre>
/**
 * Render
 * 
 * Renders a filter for
 * a column
 * 
 * @access    public
 * @param     Spark\Grid_Column_Filter    Filter
 * @return    Spark\Grid_Column_Filter_Interface
 */
public function render(\Grid_Column_Filter $filter)
{
    // Get options
    $options = $filter->get_column()->get_options();

    // Html fallback
    $html = '';

    // Make sure we have an array of options
    if ($options->get_data())
    {
        $html = \Form::select($filter->get_column()->get_identifier(),
                             $filter->get_user_value(),
                             array(null => null) + $options->get_data(),
                             array(
                                     'class'                => 'filter',
                             )
        );
    }

    $filter->set_html(html_tag('div', null, $html));

    return $this;
}
</pre>
	<p>
		As you might see, it uses Fuel's Form class to create a fieldsset element, for which the options available correspond to the options defined by the user when defining the grid column:
	</p>
<pre>
'options' => array(
    1         => 'Enabled',
    2         => 'Disabled',
)
</pre>
	<p>
		It also sets the selected option to the user value (the value selected by the user in the column - which will always be one of the options of the filter). Take a look at the rest of <code>Spark\Grid_Column_Filter_Options</code> and <code>Spark\Grid_Column_Renderer_Options</code> to see how they work. The amount of column types right now are limited, but I intend on implementing the following options over the next few days:
		<ul style="padding-left: 40px;">
			<li>Checkbox</li>
			<li>Date</li>
			<li>Datetime</li>
			<li style="text-decoration: line-through;">Number</li>
			<li style="text-decoration: line-through;">Options</li>
			<li>Price</li>
			<li>Radio</li>
			<li>Select</li>
		</ul>
	</p>
	<h2>And finally... The grid</h2>
	<?=$grid?>
	<h2>The source</h2>
	<p>
		<?=\Html::anchor('https://github.com/bencorlett/Spark/tree/develop', 'https://github.com/bencorlett/Spark/tree/develop')?> to download spark, or <?=\Html::anchor('https://github.com/bencorlett/Spark-Demo', 'https://github.com/bencorlett/Spark-Demo')?> to download the entire source code to this website. I'd recommend downloading spark off the development branch - it's getting a complete overhaul and it won't be 100% backwards compatible (this demo is running off the development branch).
	</p>
	<h4>Any questions? Improvements? Bugs? Pull requests? Want to say hi?</h4>
	<p style="text-align: center;">
		I'd love to hear from you. Really
		<br />
		<?=\Html::anchor('http://www.twitter.com/ben_corlett', '@ben_corlett')?><span style="margin: 0 20px;">|</span><?=\Html::mail_to_safe('bencorlett@me.com', 'bencorlett@me.com')?>
		<br />
		irc.freenode.net - #fuelphp - bencorlett
	</p>
</div>