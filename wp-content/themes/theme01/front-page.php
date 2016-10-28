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
		<main>
			<div class="main-container">
				<div class="home-container cd-fixed-bg">
					<h1>eTakashima</h1>
				</div>

				<div class="portfolio-container cd-scrolling-bg"> 
					<h2>PortFolio</h2>
					<p>いままでの作品をご紹介いたします。ご覧ください。</p>

					<nav class="portfolio-navigation">
						<ul class="portfolio-menue-name clearfix">
							<li><a href="">Block</a></li>
							<li><a href="">App</a></li>
							<li><a href="">Illust</a></li>
							<li><a href="">Photo</a></li>
						</ul>

						<ul class="portfolio-menue-icon clearfix">
							<li id="panel-icon-01"><a href=""><img src="<?php echo get_template_directory_uri(); ?>/img/icn_01.png" alt=""></a></li>
							<li id="panel-icon-02"><a href=""><img src="<?php echo get_template_directory_uri(); ?>/img/icn_02.png" alt=""></a></li>
							<li id="panel-icon-03"><a href=""><img src="<?php echo get_template_directory_uri(); ?>/img/icn_03.png" alt=""></a></li>
							<li id="panel-icon-04"><a href="f"><img src="<?php echo get_template_directory_uri(); ?>/img/icn_04.png" alt=""></a></li>
						</ul>
					</nav>

					<div id="factory">
						<div id="line_item"">
							<img src="<?php echo get_template_directory_uri();?>/img/factory01.png" alt=""></img>
						</div>
					</div>

					<script type="text/javascript">
						/* パネルのアイコンを揺らす*/
						$(function(){
							var elements = ["#panel-icon-01 img","#panel-icon-02 img","#panel-icon-03 img","#panel-icon-04 img"];
							func_animationSwing(elements);
						});
						/*ファクトリーラインアニメーション*/
						$(function(){
							func_inViewExec(".portfolio-container",func_animationFactory,func_animationFactoryStop,0);
						});
					</script>
				</div>

				<div class="video-container cd-fixed-bg">
					<div class="pattern"></div>

					<h2>Stop Animation Video</h2>

					<p class="youtube-icon">
						<a href="">
							<i class="fa fa-youtube" aria-hidden="true"></i>
						</a>
					</p>

					<div class="youtube">
						<iframe src="https://www.youtube.com/embed/6KAeUFpVoLs?rel=0" frameborder="0" allowfullscreen></iframe>
					</div>
				</div>

				<div class="skill-container cd-scrolling-bg">
					<div class="opacity-cover"></div>

					<h2>Skill</h2>
					
					<div class="skill-box">
						<p>Java/C#/VisualBasic/VB6/Swift/Objective-C<br>
							HTML/CSS/JavaScript/PHP/WordPress<br>
							PhotoShop/Illustrator/InDesign<br>
						</p>
					</div>

					<script type="text/javascript">
						/*フォールアニメーション*/
						$(function(){
							func_inViewExec(".skill-container",func_animationFall(".skill-container"),func_animationFallStop,0);
						});
					</script>
				</div>

				<div class="instgram-container cd-scrolling-bg">
					<!-- <div> -->
						<h2>InstGram</h2>
						<!-- SnapWidget -->
						<iframe src="https://snapwidget.com/embed/246520" class="snapwidget-widget" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:100%; ">
							
						</iframe>
					<!-- </div> -->
				</div>

			</div>
		</main>
	</div>
<?php get_footer(); ?>
