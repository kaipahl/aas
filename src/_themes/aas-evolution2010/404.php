
<?php get_header(); ?>

<body id="single">
	<div id="page">

		<div id="container">
		<!-- #bbmark =========== Content =========== -->
			<div id="content">
		
			<!-- #bbmark ........... START Posting ........... -->	
				<div class="posting">
				
				<!-- bbmark ...... START Headline ...... -->
					<div class="posting-head">
						<h2>Nichts gefunden</h2>
					</div> <!-- .headline -->
			
					<!-- bbmark ...... START Post ...... -->
					<div class="posting-content">
						<p>Sorry, aber zur URL gibt es keinen passenden Inhalt. Doh!</p>
						<p>Am besten Sie fangen nochmal mit der <a href="/">Homepage</a> an.</p>
					</div>
				
				</div><!-- .posting -->
	
				<!-- ........... ENDE Eintrag ........... -->	
			</div>
			<!-- ====== ENDE Contentspalte ====== -->
		
		
			<!-- #bbmark =========== START Spalte =========== -->
			<?php get_sidebar(); ?>
				
						
			<!-- #bbmark =========== START Spalte =========== -->
			<?php get_sidebar('right'); ?>
			
			
			<br clear="all" />
		</div> <!-- #containter -->
	</div> <!-- #page -->	

	<?php get_footer(); ?>
	
</body>
</html>