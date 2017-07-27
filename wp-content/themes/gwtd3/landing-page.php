<?php
	/**
	 * Template Name: Landing Page
	 */

	get_header();

?>
	<div id="what" class="section lp-what-it-is">
		<div class="container">
			<div class="row">
				<div class="twelve columns">
					<?php
						$page = get_page_by_title( 'What is GWTD3?' );
						$title = $page->post_title;
						echo '<h2>' . $title . '</h2>';
					?>
				</div>
			</div>
			<div class="row">
				<div class="eleven columns offset-by-one">
					<?php echo $page->post_content; ?>
				</div>
			</div>
		</div>
	</div>

	<div id="where" class="section lp-where-it-is">
		<div class="container">
			<div class="row">
				<div class="twelve columns">
					<?php
						$page = get_page_by_title( 'Where is GWTD3?' );
						$title = $page->post_title;
						echo '<h2>' . $title . '</h2>';
					?>
				</div>
			</div>
			<div class="row">
				<div class="eleven columns offset-by-one">
					<?php echo $page->post_content; ?>
				</div>
			</div>
		</div>
	</div>

	<div id="when" class="section lp-when-it-is">
		<div class="container">
			<div class="row">
				<div class="twelve columns">
					<h2><?php echo 'When is GWTD3?'; ?></h2>
				</div>
			</div>
			<div class="row">
				<div class="eleven columns offset-by-one">
					<p><strong>Global WordPress Translation Day</strong> will be from <strong>00.00 to 24.00 UTC on September 30, 2017.</strong> To help you get ready, here's the countdown to kick off:</p>
					<div id="countdown"></div>
				</div>
			</div>
		</div>
	</div>

	<div id="how" class="section lp-how-to-get-involved">
		<div class="container">
			<div class="row">
				<div class="twelve columns">
					<?php
						$page = get_page_by_title( 'Cool! How do I get involved?' );
						$title = $page->post_title;
						echo '<h2>' . $title . '</h2>';
					?>
				</div>
			</div>
			<div class="row">
				<div class="eleven columns offset-by-one">
					<?php echo $page->post_content; ?>
				</div>
			</div>
		</div>
	</div>


<?php
	get_footer();
