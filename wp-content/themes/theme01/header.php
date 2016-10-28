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

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="ポートフォリオWebです。随時更新を行なう予定です。">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
	<link href="http://fonts.googleapis.com/earlyaccess/notosansjp.css" rel="stylesheet" >
	<link href="https://fonts.googleapis.com/css?family=Baloo+Bhaina" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<!-- bodyのクラスにスラッグ名を付与 -->
<body <?php
	if (is_page()) {
	     $page = get_page(get_the_ID());
	     $slug = $page->post_name;
	     body_class("page-" . $slug);
	 } else {
	    body_class();
	 }
?>>
<body <?php body_class(); ?>>
	<header>
		<a href="<?php echo esc_url( home_url( "/" ) ); ?>" alt="logo">
			<h1 class="header-logo"></h1>
		</a>

		<nav id="gloval-navigation">
			<?php wp_nav_menu(array( "theme_location" => "primary","container" => false, "menu_class" => "main-menue" )); ?>

			<ul class="sns-menue">
				<li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				<li><a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
				<li><a href=""><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
			</ul>
		</nav>

		<div id="mobile-navigation">
			<a id="sidr-button" class="menue-button" href="#sidr-nav">
				<i class="fa fa-bars" aria-hidden="true"></i>
			</a>
		</div>

		<script type="text/javascript">
			$(function(){
			    $("#sidr-button").sidr({
			      name: "sidr",
			      source:"#gloval-navigation",
			      renaming: false,
			      side : "right",
			      speed:350
			    });
			});
		</script>
	</header>