<?php
/**
 * The loop that displays posts on homepage
 *
 *
 * @package WordPress
 * @subpackage dogfood2010
 * @since 3.0.0
 */
?>

<!-- =========== Tpl:loop-index.php -->



<section id="box-kaipahl">				
	<h1>KaiPahl</h1>
</section>


<section id="box-pic0">	
</section>


<section id="box-impressum">
	<h1><a href="/impressum" title="Impressum">Impressum</a></h1>
</section>

<section id="box-work">
	
</section>

<section id="box-bio">
	
</section>


<?php /* =========== Loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>
	
	<?php
		$dateyyyymmdd = get_the_date('c');
		$timehhmm = esc_attr( get_the_time());
		$dateddmmyyyy = get_the_date('d.m.Y');
	?>

		
	<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		
		<div class="entry-meta">
			<time class="entry-date" datetime="<?= $dateyyyymmdd ?>" pubdate><?= $timehhmm ?>, <?= $dateddmmyyyy ?></time>
		</div><!-- .entry-meta -->

	</section><!-- #post-<?php the_ID(); ?> -->


<?php endwhile; ?>

