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
?>
<?=\Html::doctype('html5')?>
<html>
<head>
	<?=\Asset::css('reset.css')?>
	<?=\Asset::css('grid.css')?>
	<?=\Asset::css('app.css')?>
	<?=\Asset::js('jquery-1.6.2.min.js')?>
	<?=\Asset::js('grid-1.0.min.js')?>
	<title><?=$title?></title>
</head>
<body>
	<div class="header-container">
		<div class="header">
			<h1 id="logo">
				Spark <span>Fuel Package</span>
			</h1>
			<?php if ($section): ?>
				<h1 class="section">
					<?=$section?>
				</h1>
			<?php endif ?>
		</div>
	</div>
	<div class="layout-container">
		<div class="layout">
			<?=$layout?>
		</div>
	</div>
	<div style="padding: 20px 0; width: 960px; margin: 0 auto; text-align: center;">
		<strong>Copyright &copy; 2011 Ben Corlett. All Rights Reserved.</strong>
	</div>
</body>
</html>