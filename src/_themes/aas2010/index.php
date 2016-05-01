<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

<div id="page-wrapper" class="hfeed">

	<div id="header">
		
		<?php
			include(ABSPATH.'../_inc/tools.inc');
			include(ABSPATH.'../_inc/aas2010.inc');
		
			// http://twitter.com/statuses/user_timeline/7602012.rss
			$twitterUrl = "http://twitter.com/statuses/user_timeline/7602012.rss";
			
			/*
			$twitterStr = file_get_contents($twitterUrl);
			$twitterDoc = new DOMDocument();
			$twitterDoc->loadXML($twitterStr);
			$arrFeeds = array();
			foreach ($twitterDoc->getElementsByTagName('item') as $node) {
				$itemRSS = array ( 
					'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
					'description' => $node->getElementsByTagName('description')->item(0)->nodeValue,
					'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
					'pubDate' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue
					);
				array_push($arrFeeds, $itemRSS);
			}
			
			var_dump($arrFeeds);
			*/
			
			// Letzten Timestamp aus DB auslesen
			$lastTimestamp = get_last_timestamp(); 
			echo '<h3>' . date('d.m.Y, H:i:s', $lastTimestamp) . '</h3>';
			
			// Älter als 90 Sekunden? 
			// -> Neuen Timestamp reinschreibem
			$timeNow = strtotime('now');
			if($timeNow - $lastTimestamp > 90) {
				write_last_timestamp();
			
				
				
			}
			
			// Letzten Eintraege auslesen
			$timeContent = get_last_content(2);
			// var_dump($timeContent);
			
			echo '<ul class="clearfix">';
			foreach ($timeContent as $item) {
				echo '<li>';
				echo '<h3><a href="'.$item['link'].'">'.$item['title'].'</a></h3>';
				echo '<div>'.$item['content'].'</div>';
				echo '</li>';
			}
			
			echo '</ul>';
			
		?>
	
	</div><!-- #header -->


	<div id="center-wrapper" class="columne-8 columne">
		<div id="content">

		<?php
		/* Run the loop to output the posts.
		 * If you want to overload this in a child theme then include a file
		 * called loop-index.php and that will be used instead.
		 */
		 get_template_part( 'loop', 'index' );
		?>
		</div><!-- #content -->

	</div><!-- #center-wrapper -->
	
<?php get_sidebar(); ?>


<?php get_template_part( 'sidebar', 'fluid' ); ?>

<?php get_footer(); ?>
