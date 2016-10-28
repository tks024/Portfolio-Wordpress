<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package portfolio_theme
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>


<aside id="portfolio-category">
	<h4>Category</h4>
	<ul>
		<?php wp_list_categories('title_li=&taxonomy=taxportfolio'); ?>
	</ul>
	
</aside>