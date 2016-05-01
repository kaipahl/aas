<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- #bbmark ====================== START HEAD ====================== -->
<head profile="http://gmpg.org/xfn/1">
	<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
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
	<script type="text/javascript" language="javascript" src="/_generic/jquery-1.3.2.min.js"></script>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="/_generic/clearfix.css" type="text/css" media="screen" />		
	<!--[if lte IE 6]>
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style_ie6.css" type="text/css" media="screen" />
	<![endif]-->	
	<!--[if IE 7]>
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style_ie7.css" type="text/css" media="screen" />
	<![endif]-->
	<!--[if IE 8]>
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style_ie8.css" type="text/css" media="screen" />
	<![endif]-->
	<!-- -->
	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url') ?>" title="<?php bloginfo('name') ?> RSS feed" />
	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php bloginfo('name') ?> comments RSS feed" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />
	<!-- -->
	<link rel="Start" href="http://www.allesaussersport.de/index.php" />
	<link rel="Index" href="http://www.allesaussersport.de/index.php" />
	<?php wp_head(); ?>
	
	<script type="text/javascript">
	<!--
	function twitterCallback(obj) {
		var output = '';
		var anzahlTweets = 10;
		if (anzahlTweets > obj.length) anzahlTweets = obj.length
		for (var i = 0; i < anzahlTweets; i++) {
			var zeile = obj[i].text;
			var datum = obj[i].created_at.split(' ');
			var day = datum[0];
			switch (day){
				case 'Sun':
					var dayStr = 'So'; break;
				case 'Mon':
					var dayStr = 'Mo'; break;
				case 'Tue':
					var dayStr = 'Di'; break;
				case 'Wed':
					var dayStr = 'Mi'; break;
				case 'Thu':
					var dayStr = 'Do'; break;
				case 'Fri':
					var dayStr = 'Fr'; break;
				case 'Sat':
					var dayStr = 'Sa'; break;
			}
			var uhr = datum[3].split(':');
			var stunde = parseInt(uhr[0])+2;
			if (stunde>23) stunde = 0;
			var uhrstr = stunde + 'h' + uhr[1];
			var headline_ende = zeile.indexOf(':');
			var headline = zeile.substr(0,headline_ende);
			var meldung = zeile.slice(headline_ende+1);
			meldung = meldung.replace(/http:\/\/([.\/a-zA-Z0-9]+)/, '[<a href="http://$1">$1</a>]');
			var teilstr = '';
			teilstr += '<small>'+dayStr + ' | ' +uhrstr+'</small>';
			teilstr += '<strong>'+headline+'</strong>';
			teilstr += meldung;
			output += '<li>' + teilstr + '</li>';
		}
		$('#tweet-aasport').html(output);
	}
	-->
	</script>
	<script type="text/javascript">
		var _gaq = _gaq || [];
		// _gaq.push(['_setAccount', 'UA-313603-1']);
		// _gaq.push(['_trackPageview']);
		_gaq.push(function() {
			_gat._anonymizeIp();
			var tracker = _gat._createTracker('UA-313603-1');
			tracker._trackPageview();
		});
		
		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
	
</head>