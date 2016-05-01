<?php
/**
 * The template used to display the footer
 *
 * Calls sidebar-footer.php for bottom widgets
 * 
 *
 * @package WordPress
 * @subpackage dogfood2010
 * @since 3.0.0
 */
?>

	<div id="footer">

			<?php get_sidebar( 'footer' ); ?>

			<ul class="clearfix">
				<li>Kai Pahl</li>
				<li>Lindenallee 46</li>
				<li>20259 Hamburg</li>
				<li>Germany</li>
				<li>kai [kringel] kaipahl.de</li>
				<li>+49 151 157 888 77</li>
			</ul>

	</div><!-- #footer -->


	<?php wp_footer(); ?>
	
</body>
</html>
