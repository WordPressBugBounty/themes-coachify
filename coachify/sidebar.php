<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * *
 * @package Coachify 
 */

$sidebar = coachify_sidebar();

if ( ! $sidebar ){
	return;
}
?>

<aside id="secondary" class="widget-area" itemscope itemtype="https://schema.org/WPSideBar">
	<?php dynamic_sidebar( $sidebar ); ?>
</aside><!-- #secondary -->
