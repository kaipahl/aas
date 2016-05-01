<?php
/**
 * The template 
 *
 * 
 * 
 *
 * @package WordPress
 * @subpackage dogfood2010
 * @since 3.0.0
 */
?>

<header id="page-header">
		
	<?php if ( is_home() || is_front_page() ) { // =========== ?>
		<h1>
			<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="/_images/logo-kai-16x16.png" alt="Logo" /></a>
			<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">Kai Pahl</a>
		</h1>
	<?php } else { // =========== ?>
		<h1>
			<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="/_images/logo-kai-16x16.png" alt="Logo" /></a>
			<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">Kai Pahl</a>
		</h1>
	<?php } ?>


	<nav>
		<ul>
			<li><a href="/impressum" title="Impressum">Impressum</a></li>
		</ul>
	</nav>


	<div id="access">
		<div class="skip-link screen-reader-text">
			<a href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentyten' ); ?>"><?php _e( 'Skip to content', 'twentyten' ); ?></a>
		</div>
		<?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'container_class' => 'menu-header' ) ); ?>
	</div><!-- #access -->
		
		
</header><!-- #header -->
