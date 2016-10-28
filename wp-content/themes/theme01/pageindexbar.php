<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package theme01
 */

get_header(); ?>

	<div class="wrap">
		<div class="page-head-container">
			<div class = "page-index">
				<h1>
				<?php wp_title(""); ?>
				</h1>
			</div>

			<div class="breadCrumb">
				<?php if ( class_exists("WP_SiteManager_bread_crumb") ) { WP_SiteManager_bread_crumb::bread_crumb("type=string"); } ?>
			</div>
		</div>

		<main>
			<div class="main-container">

