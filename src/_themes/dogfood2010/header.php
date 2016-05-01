<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage dogfood2010
 * @since 3.0.0
 */
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php
	// Returns the title based on the type of page being viewed
		if ( is_single() ) {
			single_post_title(); echo ' | '; bloginfo( 'name' );
		} elseif ( is_home() || is_front_page() ) {
			bloginfo( 'name' ); 
			if( get_bloginfo( 'description' ) ) 
				echo ' | ' ; bloginfo( 'description' ); 
			twentyten_the_page_number();
		} elseif ( is_page() ) {
			single_post_title( '' ); echo ' | '; bloginfo( 'name' );
		} elseif ( is_search() ) {
			printf( __( 'Search results for "%s"', 'twentyten' ), get_search_query() ); twentyten_the_page_number(); echo ' | '; bloginfo( 'name' );
		} elseif ( is_404() ) {
			_e( 'Not Found', 'twentyten' ); echo ' | '; bloginfo( 'name' );
		} else {
			wp_title( '' ); echo ' | '; bloginfo( 'name' ); twentyten_the_page_number();
		}
	?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="shortcut icon" href="/favicon.ico">
	<link rel="stylesheet" type="text/css" media="all" href="/_css/_basics.css" />
	<link rel="stylesheet" type="text/css" media="all" href="/_css/dogfood2010.css" />
	<?php if ( is_singular() && get_option('thread_comments') ) wp_enqueue_script( 'comment-reply' ); ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
	<script type="text/javascript" src="http://use.typekit.com/ted1zin.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	<script type="text/javascript">
	(function(){
	  // if firefox 3.5+, hide content till load (or 3 seconds) to prevent FOUT
	  var d = document, e = d.documentElement, s = d.createElement('style');
	  if (e.style.MozTransform === ''){ // gecko 1.9.1 inference
		s.textContent = 'body{visibility:hidden}';
		e.firstChild.appendChild(s);
		function f(){ s.parentNode && s.parentNode.removeChild(s); }
		addEventListener('load',f,false);
		setTimeout(f,3000); 
	  }
	})();
	</script>
</head>

<body <?php body_class(); ?>>



