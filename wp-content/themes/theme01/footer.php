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
?>
	<footer>
		<h1 class="footer-logo"><img src="<?php echo get_template_directory_uri(); ?>/img/logo_foot.png" alt=""></h1>

		<ul class="share-menue clearfix">
			<li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
			<li><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
			<li><a href=""><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
		</ul>

		<p class="rights-statement">
			Copyright &copy; eTakashima all rights reserved.
		</p>
	</footer>

<?php wp_footer() ?>
</body>

</html>