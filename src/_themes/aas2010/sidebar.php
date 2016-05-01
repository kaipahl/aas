<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage aas_2010
 * @since allesaussersport 2010
 */
?>

<div id="sidebar">
		
	<ul id="logo">
		<li><a href="/" title="Homepage allesaussersport"><img src="/_images/logo-aas2010-short.png" alt="allesaussersport" /></a></li>
	</ul><!-- /#logo -->
	
	
	<ul id="navigation">
		<li><a href="#">Archiv</a></li>
		<li><a href="#">Impressum</a></li>
		<li><a href="#">Über allesaussersport</a></li>
		<li><a href="#">Suche (ausklappbar)</a></li>
	</ul><!-- /#navigation -->

	
	
	<ul id="pages-teaser">
		<li><a href="#">March Madness</a></li>
	</ul><!-- /#navigation -->
	

	<ul id="sidebar-comments">

<?php

	dog_comments();
	 
	if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>
	
			<li id="search" class="widget-container widget_search">
				<?php get_search_form(); ?>
			</li>

			<li id="archives" class="widget-container">
				<h3 class="widget-title"><?php _e( 'Archives', 'twentyten' ); ?></h3>
				<ul>
					<?php wp_get_archives( 'type=monthly' ); ?>
				</ul>
			</li>

			<li id="meta" class="widget-container">
				<h3 class="widget-title"><?php _e( 'Meta', 'twentyten' ); ?></h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</li>

<?php endif; // end primary widget area ?>
		
	</ul><!-- /#sidebar-comments -->
	
</div><!-- /#sidebar -->




<?php
	// A second sidebar for widgets, just because.
	if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>

		<div id="secondary" class="widget-area" role="complementary">
		
			<?php
				$twitterUrl = "http://www.google.com/calendar/feeds/vkbfju88rs49j0ceqkoq4mdb58%40group.calendar.google.com/public/basic";
				$twitterStr = file_get_contents($twitterUrl);
			?>
			<ul class="xoxo">
				<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
			</ul>
		</div><!-- #secondary .widget-area -->

<?php endif; ?>
