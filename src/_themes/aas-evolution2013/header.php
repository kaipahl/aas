<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7 oldie" lang="de"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie10 lt-ie9 lt-ie8 oldie" lang="de"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie10 lt-ie9 oldie" lang="de"> <![endif]-->
<!--[if IE 9]>    <html class="no-js lt-ie10 oldie" lang="de"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="de"> <!--<![endif]-->

<!-- #bbmark ====================== START HEAD ====================== -->
<head profile="http://gmpg.org/xfn/1">
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="generator" content="Drupal 8.0.5" />
	<!-- Open Graph -->
	<meta property="og:site_name" content="<?php bloginfo('name'); ?>">
	<meta property="og:image" content="http://www.allesaussersport.de/_img/sidebar-logo-aas2010-240.png" />
	<meta property="fb:page_id" content="182601149731"/>
	<?php if (is_page()) : ?>
		<meta property="og:type" content="article" />
		<meta property="og:url" content="<?php the_permalink(); ?>">
		<meta property="og:title" content="<?php the_title(); ?>" />
	<?php elseif (is_single() ) : ?>
		<meta property="og:url" content="<?php the_permalink(); ?>">
		<meta property="og:title" content="<?php the_title(); ?>" />
		<meta property="og:type" content="article" />
	<?php elseif (is_home() ) : ?>
		<meta property="og:type" content="website" />
		<meta property="og:title" content="Allesaussersport" />
		<meta property="og:url" content="http://www.allesaussersport.de">
	<?php else : ?>
		<meta property="og:type" content="website" />
		<meta property="og:url" content="<?php the_permalink(); ?>">
		<meta property="og:title" content="<?php the_title(); ?>" />
	<?php endif; ?>
	<!-- -->
	<meta name="author" content="Kai Pahl" />
	<meta name="Content-language" content="de" />
	<meta name="copyright" content="allesaussersport, Hamburg, Germany" />
	<?php
		$metaDescStr = 'Ein Sportblog von Kai Pahl mit einem Blogeintrag &uuml;ber ';
		$metaKeyStr = 'Sport, Blog, Weblog, Kai Pahl, dogfood, Fu&szlig;ball, Bundesliga, Sportmedien, US-Sport, Screensport';
		global $post;
		foreach((get_the_category($post->ID)) as $category) {
			$catStr .= ', ' . $category->cat_name;
		};
		if ( is_404() ) {
			$metaDescStr = 'Fehlerseite des Sportblogs von Kaipahl &quot;allesaussersport&quot;';
			$metaKeyStr .= '';
		};
		if ( is_home() ) {
			$metaDescStr = 'Homepage des Sportblogs &quot;allesaussersport&quot; von Kai Pahl mit Blogeintr&auml;gen quer durch den Sport und Sportmedien.';
			$metaKeyStr .=  $catStr;
		};
		if ( is_category() ) {
			$metaDescStr .= substr_replace($catStr, '', 0, 2);
			$metaKeyStr .= $catStr;
		};
		if ( is_date() ) {
			$metaDescStr = 'Ein Sportblog von Kai Pahl mit Blogeintr&auml;gen von ' . single_month_title(' ', false);
			$metaKeyStr .= $catStr;
		};
		if ( is_search() ) {
			$metaDescStr .= '';
			$metaKeyStr .= '';
		};
		if ( is_single() ) {
			$metaDescStr .= wp_title('&quot;', false) . '&quot;';
			$metaKeyStr .= $catStr;
		};
		if ( is_page() ) {
			$metaDescStr = 'Ein Sportblog von Kai Pahl';
			$metaKeyStr .= '';
		};
		if ( is_tag() ) {
			$metaDescStr .= substr_replace(wp_title('', false), '', 0, 2);
			$metaKeyStr .= ', ' . substr_replace(wp_title('', false), '', 0, 2) . $catStr;
		};
	?>
	<meta name="description" content="<?php echo $metaDescStr; ?>" />
	<meta name="keywords" content="<?php echo $metaKeyStr; ?>" />
	<meta name="robots" content="index,follow" />
	<?php
		if ( is_home() ) {
			echo '<meta name="revisit-after" content="1 days" />';
		} else {
			echo '<meta name="revisit-after" content="14 days" />';
		}
	?>
	<!-- -->
	<title>
		<?php
			if ( is_404() ) _e('Seite nicht gefunden | allesaussersport');
			if ( is_home() ) _e('allesaussersport | Das Blog eines TV-Sport-Verrückten');
			if ( is_category() ) echo single_cat_title() . ' | allesaussersport';
			if ( is_date() ) _e('Archiv | allesaussersport');
			if ( is_search() ) _e('Suchergebnisse | allesaussersport');
			if ( is_single() ) echo wp_title('', false) . ' | allesaussersport';
			if ( is_page() ) echo wp_title('', false) . ' | allesaussersport';
			if ( is_tag() ) echo wp_title('', false) . ' | allesaussersport';
		?>
	</title>
	<link href="https://plus.google.com/108439196600039005324" rel="publisher" />
	<link href="https://plus.google.com/109682649753075771516" rel="author" />
	<link rel="stylesheet" href="/_css/aas2013.css?tmp=7" type="text/css" media="screen" />

	<script type="text/javascript" language="javascript" src="/_js/jquery-1.11.3.min.js"></script>

	<?php wp_head(); ?>

</head>
