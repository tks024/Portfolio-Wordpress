<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package theme01
 */

get_header(); ?>
		<?php get_template_part("pageindexbar"); ?>
				<?php get_sidebar(); ?>	
				<script type="text/javascript">
					/*サイドバー位置調整*/
					$(function(){
						func_adjustFixedElement("#portfolio-category",".wrap");
					});
				</script>

				<div class="portfolio-archive-container">
					<div class="grid">
						<?php if ( have_posts() ) : ?>
							<?php while ( have_posts() ) : the_post(); ?>
								<article class="grid_item grid_item_2col">
									<figure class="grid_item_img">
										<a href="<?php echo esc_url(get_permalink()); ?>">
											<?php if(has_post_thumbnail()){ ?>
												<?php the_post_thumbnail("category-thumb"); ?>
											<?php }else{ ?>
												<img src="http://placehold.it/360x360" alt="" width="360" height="360">
											<?php } ?>
										</a>
									</figure>
									<div class="grid_item_text">
										<h2><?php the_title();?></h2>
									</div>
								</article>
							<?php endwhile; ?>
							<?php the_posts_navigation(); ?>
						<?php else : ?>
							<?php get_template_part("template-parts/content","none"); ?>
						<?php endif; ?>
					</div>
				</div>
				
				<script type="text/javascript">
					$(function(){
						$(".grid_item_img").each(function(){
							var
								$img = $("img,iframe",this).eq(0),
								imgwidth = $img.attr("width"),
								imgheight = $img.attr("height")
							;
							$(this)
								.css({ "padding-bottom" : ( imgheight/imgwidth*100 ) + "%" })
							;
						});

						/* Masonry on grid */
						var $grid = $(".grid")
							.append( $('<div class="grid_column_sizer"/><div class="grid_gutter_sizer"/>') )
							.masonry({
								itemSelector: ".grid_item",
								columnWidth: ".grid_column_sizer",
								gutter: ".grid_gutter_sizer"
							});
					});
				</script>
				
			</div>
		</main>
	</div>

<?php
get_footer();
