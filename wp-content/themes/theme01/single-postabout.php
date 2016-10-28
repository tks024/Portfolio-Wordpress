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
				<div class="about-container clearfix">
					<div class="profile-block">
						<div class="block-stud block-stud-left block-01-dark"></div>
						<div class="block-stud block-stud-right block-01-dark"></div>
						<div class="block-body-back block-01-light"></div>
						<div class="block-body-front block-01-dark">
							<h3>Profile</h3>
							<dl>
								<dt>Name &gt;</dt>
							    <dd><?php
									$item_value = SCF::get("Name");
						         	echo esc_html($item_value); ?></dd>
								<dt>Gendar &gt;</dt>
								<dd><?php
									$item_value = SCF::get("Gendar");
									echo esc_html($item_value); ?></dd>
								<dt>Job &gt;</dt>
								<dd><?php
									$item_value = SCF::get("Job");
									echo esc_html($item_value); ?></dd>
								<dt>City &gt;</dt>
								<dd><?php
									$item_value = SCF::get("City");
									echo esc_html($item_value); ?></dd>
								<dt>Mail &gt;</dt>
								<dd><?php
									$item_value = SCF::get("Mail");
									echo esc_html($item_value); ?></dd>
								<dt>Site &gt;</dt>
								<dd><?php
									$item_value = SCF::get("Site");
									echo esc_html($item_value); ?></dd>
							</dl>
						</div>
					</div>

					<div class="sns-block">
						<div class="block-stud block-stud-left block-02-dark"></div>
						<div class="block-stud block-stud-right block-02-dark"></div>
						<div class="block-body-back block-02-light"></div>
						<div class="block-body-front block-02-dark">
							<h3>SNS</h3>
							<dl>
								<dt>Instgram &gt;</dt>
								<dd><?php
									$item_value = SCF::get("Instgram");
									echo esc_html($item_value); ?></dd>
								<dt>Twitter &gt;</dt>
								<dd><?php
									$item_value = SCF::get("Twitter");
									echo esc_html($item_value); ?></dd>
								<dt>Tumbler &gt;</dt>
								<dd><?php
									$item_value = SCF::get("Tumbler");
									echo esc_html($item_value); ?></dd>
							</dl>
						</div>
					</div>
					<div class="hobby-block">
						<div class="block-stud block-stud-left block-03-dark"></div>
						<div class="block-stud block-stud-right block-03-dark"></div>
						<div class="block-body-back block-03-light"></div>
						<div class="block-body-front block-03-dark">
							<h3>Hobby</h3>
							<dl>
								<dt>LEGO &gt;</dt>
								<dd><?php
									$item_value = SCF::get("LEGO");
									echo esc_html($item_value); ?></dd>
								<dt>StopAnimation&gt;</dt>
								<dd><?php
									$item_value = SCF::get("StopAnimation");
									echo esc_html($item_value); ?></dd>
								<dt>BaseBall&gt;</dt>
								<dd><?php
									$item_value = SCF::get("Baseball");
									echo esc_html($item_value); ?></dd>
								<dt>Cooking&gt;</dt>
								<dd><?php
									$item_value = SCF::get("Cooking");
									echo esc_html($item_value); ?></dd>
								<dt>Shopping&gt;</dt>
								<dd><?php
									$item_value = SCF::get("Shopping");
									echo esc_html($item_value); ?></dd>
							</dl>
						</div>
					</div>
				</div>

				<script>
					var ratio = 0.65;
					$(function () {
						func_adjustHeight(".profile-block",ratio);
						func_adjustHeight(".sns-block",ratio);
						func_adjustHeight(".hobby-block",ratio);
					});
					$(window).resize(function () {
					   	func_adjustHeight(".profile-block",ratio);
						func_adjustHeight(".sns-block",ratio);
						func_adjustHeight(".hobby-block",ratio);
					});
				</script>
			</div>
		</main>
	</div>

<?php
get_footer();
