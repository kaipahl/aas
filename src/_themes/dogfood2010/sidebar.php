<?php
/**
 * The Sidebar containing the primary and secondary widget areas
 *
 * @package WordPress
 * @subpackage dogfood2010
 * @since 3.0.0
 */
?>

<!-- =========== sidebar.tpl -->
<div class="sidebar">

	<div id="primary" class="widget-area">
		<ul class="xoxo">
		<?php if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : // begin primary widget area ?>
	
		<?php endif; // end primary widget area ?>
		</ul>
	</div><!-- #primary .widget-area -->
	
	
	
	<?php if ( is_active_sidebar( 'secondary-widget-area' ) ) : // Nothing here by default and design ?>
	<div id="secondary" class="widget-area">
		<ul class="xoxo">
			<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
		</ul>
	</div><!-- #secondary .widget-area -->
	<?php endif; ?>

</div><!-- /.sidebar -->
