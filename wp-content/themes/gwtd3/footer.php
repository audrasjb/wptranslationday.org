<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gwtd3
 */

?>
		<div class="section footer-tuned bg-color-gray--dark text-color-gray--light">
			<div class="container">
				<div class="row">
					<div class="six columns text-left">
						<?php if ( is_active_sidebar( 'subscribe-area' ) ) : ?>
							<div id="subscribe-form">
								<?php dynamic_sidebar( 'subscribe-area' ); ?>
							</div>
						<?php endif; ?>
					</div>
					<div class="six columns text-center">
						<?php if ( is_active_sidebar( 'footer-social' ) ) : ?>
							<div id="footer-social">
								<?php dynamic_sidebar( 'footer-social' ); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>

		<div class="section footer-menu-holder bg-color-gray--dark text-color-gray--light">
			<div class="container">
				<div class="row">
					<div class="twelve columns text-left">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'footer-menu',
							'menu_id' => 'footer-menu',
						) );
						?>
					</div>
				</div>
			</div>
		</div>

		<div class="section bottom sp bg-color-gray--darker">
			<div class="container">
				<div class="row">
					<div class="four columns siteground text-center item">
						<a href="https://siteground.com/" target="_blank" title="SiteGround">
							<img src="<?php echo get_template_directory_uri(); ?>/img/sp/siteground2.png" alt="SiteGround logo" width="400" />
						</a>
						<h4 class="title text-color-gray--lighter">Proudly hosted by<br/>SiteGround</h4>
					</div>
					<div class="four columns crowdcast text-center item">
						<a href="https://www.crowdcast.io/" target="_blank" title="crowdcast">
							<img src="<?php echo get_template_directory_uri(); ?>/img/sp/crowdcast2.png" alt="crowdcast logo" width="300" />
						</a>
						<h4 class="title text-color-gray--lighter">Live sessions powered by<br/>Crowdcast</h4>
					</div>
					<div class="four columns mailpoet text-center item">
						<a href="https://www.mailpoet.com/" target="_blank" title="mailpoet">
							<img src="<?php echo get_template_directory_uri(); ?>/img/sp/mailpoet2.png" alt="mailpoet logo" width="300" />
						</a>
						<h4 class="title text-color-gray--lighter">Mailings powered by<br/>MailPoet</h4>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<div id="to-top">
	<a href="#top" id="smoothup" title="Back to top"><img alt="Back to Top" src="<?php echo get_template_directory_uri(); ?>/img/backtotop.png"/></a>
</div>
<?php wp_footer(); ?>
</body>
</html>
