<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="de"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="de"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="de"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="de"> <!--<![endif]-->

<!-- #bbmark ====================== START HEAD ====================== -->
<head profile="http://gmpg.org/xfn/1">
	<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
	<meta name="generator" content="Drupal 6.24" />
	<!-- Open Graph -->
	<meta property="og:site_name"        content="<?php bloginfo('name'); ?>">
	<meta property="og:image"            content="http://www.allesaussersport.de/_img/sidebar-logo-aas2010-240.png" /> 
	<meta property="fb:page_id"          content="182601149731"/>
	<?php if (is_page()) : ?> 
		<meta property="og:type" content="article" />
		<meta property="og:url"              content="<?php the_permalink(); ?>">
		<meta property="og:title"            content="<?php the_title(); ?>" /> 
	<?php elseif (is_single() ) : ?> 
		<meta property="og:url"             content="<?php the_permalink(); ?>">
		<meta property="og:title"            content="<?php the_title(); ?>" /> 
		<meta property="og:type" 			content="article" />
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
	<meta http-equiv="imagetoolbar" content="no" />
	<meta name="robots" content="index,follow" />
	<meta name="revisit-after" content="1 days" />
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
	<script type="text/javascript" language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
	<script type="text/javascript" language="javascript" src="/_js/modernizr-2.js"></script>
	<script type="text/javascript" language="javascript" src="/_js/aas2011.js?n=15"></script>
	<link rel="stylesheet" href="/_css/aas2011evo.css?tmp=12" type="text/css" media="screen" />
	<link rel="stylesheet" href="/_css/clearfix.css" type="text/css" media="screen" />		
	<!--[if lte IE 6]>
		<link rel="stylesheet" href="/_css/aas2011evo_ie6.css" type="text/css" media="screen" />
	<![endif]-->	
	<!--[if IE 7]>
		<link rel="stylesheet" href="/_css/aas2011evo_ie7.css" type="text/css" media="screen" />
	<![endif]-->
	<!--[if IE 8]>
		<link rel="stylesheet" href="/_css/aas2011evo_ie8.css" type="text/css" media="screen" />
	<![endif]-->
	<?php wp_head(); ?>
	
	<script type="text/javascript">
	<!--
	-->
	</script>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-313603-1']); _gaq.push (['_gat._anonymizeIp']); _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
	
</head>