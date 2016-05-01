<?php get_header(); ?>

<body id="suche">
	<div id="page">
	
		<!-- #bbmark =========== Kopfzeile =========== -->
		<?php dog_header(); ?>
	
		<div id="container">
		<!-- #bbmark =========== Content =========== -->
			<div id="content">
	
				<!-- bbmark ...... START Pager ...... -->
				<div class="pager">
					<div class="prev"><?php posts_nav_link('','','&laquo; &Auml;ltere Eintr&auml;ge') ?></div>
					<div class="succ"><?php posts_nav_link('','Neuere Eintr&auml;ge &raquo;','') ?></div>
				</div>
				<div style="clear: both;">&nbsp;</div>
	
				<?php while (have_posts()) : the_post(); ?>
			
				<!-- #bbmark ........... START Posting ........... -->	
				<div class="posting">
					<!-- bbmark ...... START Headline ...... -->
					<div class="posting-head">
						<div class="meta">
							<span class="date"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_time("j.n.Y, G:i") ?></a> · <?php comments_popup_link('kein Kommentar', '1 Kommentar', '% Kommentare'); ?></span><span class="category"><?php the_category(' /') ?></span>
						</div>
						<h2><a href="<?php echo get_permalink() ?>"><?php the_title(); ?></a></h2>
					</div>
					
					<div class="posting-content">	
						<?php the_excerpt(); ?>
						<div class="more"><a href="<?php echo get_permalink() ?>" title="Zum Eintrag '<?php the_title(); ?>'">Weiterlesen ...</a></div>
					</div>
					
				</div> <!-- .posting -->
				<?php endwhile; ?>
				<!-- ...... ENDE Postings ...... -->
			
			</div> <!-- #content -->
			
		<!-- ====== ENDE Contentspalte ====== -->

	<!-- #bbmark =========== START Spalte Links =========== -->
	<div id="sidenav">

		<!-- #bbmark ........... START Home ........... -->	
		<div class="box" id="home">
			<div>Was ist das hier für eine Webseite? Es handelt sich um eine Übersichtsseite im Weblog allesaussersport.de von 'dogfood' (siehe <a href="/impressum/">Impressum</a>).</div>
			<div>Hier finden sich zehn Einträge zu einem bestimmten Suchbegriff. Aktuelle Einträge sind auf der <a href="/" title="Startseite">Startseite</a> finden.</div>
			<div><a href="/impressum/" title="Impressum der Site">Impressum</a></div>
			<div><a href="/index.rdf">RSS 1.0</a> | <a href="/index.xml">RSS 2.0</a></div>
		</div>
		
		<!-- ........... ENDE Home ........... -->	
		
		<!-- #bbmark ........... START Suche ........... -->
		<div class="box box-archives">
			<h2>Archiv | Volltextsuche</h2>
			<ul>
				<?php include (TEMPLATEPATH . "/searchform.php"); ?>
			</ul>
		</div>
		<!-- ........... ENDE Suche ........... -->
		
		<!-- #bbmark ........... START Die Site ........... -->	
		<div class="box box-comments">
			<h2>&nbsp;</h2>
			<div><a href="http://performancing.com">Webstats by performancing.com</a></div>
			<div id="badges">
				<div><a href="http://www.allesaussersport.de/index.rdf" title="RSS 1.0-Feed"><img src="/_images/_button_rss10.gif" alt="RSS 1.0 Badge" width="80" height="15" /></a><a href="http://www.allesaussersport.de/index.xml" title="RSS 2.0-Feed"><img src="/_images/_button_rss20.gif" alt="RSS 2.0 Badge" width="80" height="15" /></a><a href="http://www.wordpress.org" title="Das verwendete CMS: WordPress 1.3"><img src="/_images/_button_wp.gif" alt="Wordpress Badge" width="80" height="15" /></a><a href="http://www.barebones.com/products/bbedit/index.shtml" title="Der verwendete Editor: BBedit"><img src="/_images/_button_bbedit.gif" alt="Barebones BBEdit Badge" width="80" height="15" /></a></div>
			</div>
		</div>
		<!-- ........... ENDE Search ........... -->
			<!-- Start of StatCounter Code -->
		<script type="text/javascript">
		<!-- 
		var sc_project=488656; 
		var sc_partition=3; 
		var sc_invisible=1; 
		//-->
		</script>
		<script type="text/javascript" src="http://www.statcounter.com/counter/counter_xhtml.js"></script><noscript><div class="statcounter"><a class="statcounter" href="http://www.statcounter.com/"><img class="statcounter" src="http://c4.statcounter.com/counter.php?sc_project=488656&amp;java=0&amp;invisible=1" alt="website hit counter" /></a></div></noscript>
		<!-- End of StatCounter Code -->
		</div>
		<!-- ====== ENDE Spalte Links ====== -->
		<br clear="all" />
		</div> <!-- #container -->
	</div> <!-- #page -->

	<?php get_footer(); ?>
</body>
</html>
