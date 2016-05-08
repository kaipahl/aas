<?php
/**
 * Comment template file.
 *
 * @package aas-evolution2013
 * @since aas-evolution2013 1.1
 */

 // Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');

	/* This variable is for alternating comment background */
	$oddcomment = 'graybox';
	$commStatus = 'closed';
?>

<!-- You can start editing here. -->
<div class="o-box-comments">

	<?php if ('open' == $commStatus) : ?>
	<div class="m-comments-description">


		<h3><?php comments_number('<strong>Keine</strong> Kommentare','<strong>1</strong> Kommentar','<strong>%</strong> Kommentare' );?></h3>

		<?php if (('open' == $commStatus) && ('open' == $post->ping_status)) {  ?>
			<p>Sie können <a href="#respond">einen <strong>Kommentar</strong> hinterlassen</a>, oder <a href="<?php trackback_url(display); ?>">einen <strong>Trackback</strong> setzen</a>.</p>


		<?php } elseif (!('open' == $commStatus) && ('open' == $post->ping_status)) { ?>
			<p>Die Kommentare sind geschlossen, aber Sie können <a href="<?php trackback_url(display); ?> ">einen Trackback setzen</a>.</p>


		<?php } elseif (!('open' == $commStatus) && !('open' == $post->ping_status)) { ?>
			<p>Kommentare und Pings sind geschlossen.	</p>
		<?php } ?>

		<p>Alle Kommentare in diesem Blog können per <strong><a href="<?php bloginfo_rss('comments_rss2_url'); ?>">RSS 2.0</a>-Feed</strong> abonniert werden.</p>

	</div><!-- /.m-comments-description -->
	<?php endif; ?>




<!-- ============================================== -->

	<div class="m-comments-description-nocomments">
		<div class="wrapper">
			<h4 class="a-comments-description-title">Wo kann man Kommentare eingeben?</h4>
			<p>Nach elf Jahren habe ich die Kommentare im Blog mangels Zeit für Kommentarverwaltung geschlossen. Es kann noch kommentiert werden. Es ist aber etwas umständlicher geworden.</p>
			<ol>
				<li>Das Kommentarblog <strong><a href="http://allesausseraas.de/">http://allesausseraas.de/</a></strong>, aufgezogen von den Lesern Sternburg und OtherTimes</li>
				<li>Sogenannte „<strong>Webmentions</strong>“ mit einem eigenen Blog. Siehe <a href="https://indiewebcamp.com/Webmention#Andy_Sylvester_with_WordPress_Webmention_plugin">IndieWebCamp</a></li>
			</ol>
		</div>
	</div><!-- /.m-comments-description-nocomments -->


	<?php if ($comments) : ?>

		<?php
			$comment_anzahl = count($comments);
			$comment_counter = 0;
			$comment_class = 'first';
		?>

		<ol class="m-comments">
		<?php foreach ($comments as $comment) : ?>
			<?php
				$comment_counter++;
				if ($comment_counter == $comment_anzahl) {
					$comment_class = 'last';
				} else if ($comment_counter == 2) {
					$comment_class = '';
				}

				$comment_id = get_comment_ID();
				$comment_type = get_comment_type($comment_id);
				if ($comment_type === 'comments') {
					$comment_type_str = 'Kommentare';
				} else if ($comment_type === 'trackback') {
					$comment_type_str = 'Trackback';
				} else if ($comment_type === 'pingback') {
					$comment_type_str = 'Pingback';
				} else {
					$comment_type_str = '';
				}

				$comment_type_markup = '<a href="#comment-' . $comment_id . '" title="">';
				$comment_type_markup .= get_comment_type($comment_id);
				$comment_type_markup .= $comment_type_str;
				$comment_type_markup .= '</a>';

				$comment_date_markup = '<a href="#comment-' . $comment_id . '" title="">';
				$comment_date_markup .= get_comment_time('D, j M Y, G:i');
				$comment_date_markup .= '</a>';

				$comment_author_markup = get_comment_author_link() . ' ';
				$comment_edit_markup = '<a href="' . get_edit_comment_link('Edit') . '" class="a-btn-edit">Edit</a>';
			?>

			<li class="m-comment <?php comment_author() ?>" id="comment-<?php echo $comment_id; ?>">
				<?php
					if ($comment_class == 'first') { echo '<a name="comment-first"></a>'; }
					if ($comment_class == 'last') {	echo '<a name="comment-last"></a>'; }
				?>
				<ul class="m-comment-meta">
					<li class="m-comment-date">
						<?php echo $comment_type_markup; ?>
						<?php echo $comment_date_markup; ?>
					</li>
					<li class="m-comment-author">
						<?php echo $comment_author_markup; ?>
						<?php echo $comment_edit_markup; ?>
					</li>
				</ul><!-- /.m-comment-meta -->

				<div class="m-comment-text">
					<?php comment_text() ?>
				</div>

			</li><!-- /.comment -->

		<?php endforeach; ?>

		</ol><!-- /.m-comments -->


	<?php endif; ?>


</div><!-- /.o-box-comments -->



