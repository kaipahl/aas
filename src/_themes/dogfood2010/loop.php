<?php
/**
 * The loop that displays posts
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * @package WordPress
 * @subpackage dogfood2010
 * @since 3.0.0
 */
?>

<!-- =========== Tpl:loop.php -->


<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
	<div id="nav-above" class="navigation">
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyten' ) ); ?></div>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
	</div><!-- #nav-above -->
<?php endif; ?>



<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
	<article id="post-0" class="post error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', 'twentyten' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested Archive. Perhaps searching will help find a related post.', 'twentyten' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</article><!-- #post-0 -->
<?php endif; ?>



<?php /* =========== Loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>
	
	<?php
		$dateyyyymmdd = get_the_date('c');
		$timehhmm = esc_attr( get_the_time());
		$dateddmmyyyy = get_the_date('d.m.Y');
	?>

	<?php if ( in_category( _x('gallery', 'gallery category slug', 'twentyten') ) ) : ?>
		
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

			<div class="entry-meta">
				<?php
					printf( __( '<a href="%1$s" rel="bookmark"><span class="entry-date">%3$s, %2$s</span></a>', 'twentyten' ),
						get_permalink(),
						esc_attr( get_the_time() ),
						get_the_date()
					);
				?>
			</div><!-- .entry-meta -->

			<div class="entry-content">
				<div class="gallery-thumb">
					<a class="size-thumbnail" href="<?php the_permalink(); ?>"><?php
					$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
					$total_images = count( $images );
					$image = array_shift( $images );
					echo wp_get_attachment_image( $image->ID, 'thumbnail' );
					?></a>
				</div>
				<p><em><?php printf( __( 'This gallery contains <a %1$s>%2$s photos</a>.', 'twentyten' ),
						'href="' . get_permalink() . '" title="' . sprintf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark"',
						$total_images
					); ?></em></p>

				<?php the_excerpt( '' ); ?>
			</div><!-- .entry-content -->

			<div class="entry-utility">
				<?php
					$category_id = get_cat_ID( 'Gallery' );
					$category_link = get_category_link( $category_id );
				?>
				<a href="<?php echo $category_link; ?>" title="<?php esc_attr_e( 'View posts in the Gallery category', 'twentyten' ); ?>"><?php _e( 'More Galleries', 'twentyten' ); ?></a>
				<span class="meta-sep"> | </span>
				<span class="comments-link"><?php comments_popup_link( __( 'Kommentar hinterlassen', 'twentyten' ), __( '1 Kommentar', 'twentyten' ), __( '% Kommentare', 'twentyten' ) ); ?></span>
				<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
			</div><!-- #entry-utility -->
		</div>



<?php /* How to display posts in the asides category */ ?>
	<?php elseif ( in_category( _x('asides', 'asides category slug', 'twentyten') ) ) : ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php if ( is_archive() || is_search() ) : // Only display Excerpts for archives & search ?>
				<div class="entry-summary">
					<?php the_excerpt('Continue reading <span class="meta-nav">&rarr;</span>'); ?>
				</div><!-- .entry-summary -->
			<?php else : ?>
				<div class="entry-content">
					<?php the_content('Continue reading <span class="meta-nav">&rarr;</span>'); ?>
				</div><!-- .entry-content -->
			<?php endif; ?>

			<div class="entry-utility">
				<time class="entry-date" datetime="<?= $dateyyyymmdd ?>" pubdate><?= $timehhmm ?>, <?= $dateddmmyyyy ?></time>
				<span class="meta-sep"> | </span>
				<span class="comments-link"><?php comments_popup_link('Kommentar hinterlassen', '1 Kommentar', '% Kommentare'); ?></span>
				<?php edit_post_link('Edit', '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
			</div><!-- #entry-utility -->
		</article><!-- #post-<?php the_ID(); ?> -->

<?php /* How to display all other posts */ ?>
	<?php else : ?>
	
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			
			<div class="entry-meta">
				<time class="entry-date" datetime="<?= $dateyyyymmdd ?>" pubdate><?= $timehhmm ?>, <?= $dateddmmyyyy ?></time>
			</div><!-- .entry-meta -->

			<?php if ( is_archive() || is_search() ) : // Only display Excerpts for archives & search ?>
					<div class="entry-summary">
						<?php the_excerpt('Continue reading <span class="meta-nav">&rarr;</span>'); ?>
					</div><!-- .entry-summary -->
			<?php else : ?>
					<div class="entry-content">
						<?php the_content('Continue reading <span class="meta-nav">&rarr;</span>'); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . 'Pages:', 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->
			<?php endif; ?>

			<div class="entry-utility">
				<?php the_tags( '<span class="entry-utility-prep entry-utility-prep-tag-links">' . 'Tagged ' . '</span>', ', ', '<span class="meta-sep"> | </span>' ); ?>
				<span class="comments-link"><?php comments_popup_link('Kommentar hinterlassen', '1 Kommentar', '% Kommentare' ); ?></span>
				<?php edit_post_link( 'Edit', '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
			</div><!-- #entry-utility -->
		</article><!-- #post-<?php the_ID(); ?> -->

		<?php comments_template( '', true ); ?>

	<?php endif; // if different categories queried ?>
<?php endwhile; ?>




<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyten' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
				</div><!-- #nav-below -->
<?php endif; ?>
