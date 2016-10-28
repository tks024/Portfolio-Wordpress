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

	<?php get_template_part("pageindexbar"); ?>
			<div class="contact-container">
				<?php
				while ( have_posts() ) : the_post();
					// the_content();
					$item_value = SCF::get("contactcode");
					echo do_shortcode($item_value);
				endwhile;
				?>
			</div>

		</main>
	</div>

<?php
get_footer();