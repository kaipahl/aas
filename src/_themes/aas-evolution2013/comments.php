<?php
/**
 * Comment template file.
 *
 * @package aas-evolution2013
 * @since aas-evolution2013 1.0
 */
 
 // Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');

	/* This variable is for alternating comment background */
	$oddcomment = 'graybox';
	
	$commStatus = 'closed';
?>

<!-- You can start editing here. -->
<div id="comments">
	
	<div class="comments-description clearfix">
				
	<?php if ('open' == $commStatus) : ?>
	
		<h3><?php comments_number('<big>Keine</big> Kommentare','<big>1</big> Kommentar','<big>%</big> Kommentare' );?></h3>
	
		<?php if (('open' == $commStatus) && ('open' == $post->ping_status)) {  ?>
			<p>Sie können <a href="#respond">einen <strong>Kommentar</strong> hinterlassen</a>, oder <a href="<?php trackback_url(display); ?>">einen <strong>Trackback</strong> setzen</a>.</p>
			
			
		<?php } elseif (!('open' == $commStatus) && ('open' == $post->ping_status)) { ?>
			<p>Die Kommentare sind geschlossen, aber Sie können <a href="<?php trackback_url(display); ?> ">einen Trackback setzen</a>.</p>
			
			
		<?php } elseif (!('open' == $commStatus) && !('open' == $post->ping_status)) { ?>
			<p>Kommentare und Pings sind geschlossen.	</p>		
		<?php } ?>
		
		<p>Alle Kommentare in diesem Blog können per <strong><a href="<?php bloginfo_rss('comments_rss2_url'); ?>">RSS 2.0</a>-Feed</strong> abonniert werden.</p>
		
	<?php endif; ?>
</div><!-- /#comments -->
	

<!-- ============================================== -->


<?php if ($comments) : ?>
	
	<?php
		$comment_anzahl = count($comments);
		$comment_counter = 0;
		$comment_class = 'first';
	?>

		<ol id="commentlist">
		<?php foreach ($comments as $comment) : ?>
			<?php 
				$comment_counter++;
				if ($comment_counter == $comment_anzahl) {
					$comment_class = 'last';
				} else if ($comment_counter == 2) {
					$comment_class = '';
				}
			?>
		
			<li class="comment <?php echo comment_author() ?>" id="comment-<?php comment_ID() ?>">
				<?php 
					if ($comment_class == 'first') {	echo '<a name="comment-first"></a>'; } 
					if ($comment_class == 'last') {	echo '<a name="comment-last"></a>'; } 
				?>
				<ul class="labels comment-meta clearfix">
					<li class="comment-date">
						<a href="#comment-<?php comment_ID() ?>" title=""><?php comment_type('Kommentar', 'Trackback', 'Pingback'); ?></a>
						<a href="#comment-<?php comment_ID() ?>" title=""><?php comment_time('D, j M Y, G:i') ?></a>
					</li>
					<li class="comment-author">
						<span><?php comment_author_link() ?> <?php edit_comment_link('Edit'); ?></span>
					</li>
				</ul>
				
				<div class="comment-text">
					<?php comment_text() ?>
				</div>
				
			</li>
			
			<?php /* Changes every other comment to a different class */	
				if('graybox' == $oddcomment) {$oddcomment="";}
				else { $oddcomment = "graybox"; }
			?>
	
		<?php endforeach; /* end for each comment */ ?>	
		</ol>


	<?php endif; ?>
	
</div>


<!-- ============================================== -->


<div class="nocomments" style="background-color: #eeedd5; padding: 16px;">
	<p>Das war es mit elf Jahren Kommentaren auf <em>allesaussersport</em>. Ich habe im zunehmenden Maße keinen Sinn mehr gesehen, meine begrenzten Ressoucen auf eine wie auch immer geartete Verwaltung der Kommentare zu verwenden. Es ist an der Zeit einen Schlussstrich zu setzen. Die Kommentare sind und bleiben geschlossen.</p>
	<p>Wer aber weiterhin Kommentare schreiben und/oder lesen möchte, für den hat Lesern <em>Sternburg</em> eine Alternative  aufgesetzt: <strong style="background-color: #cccdc5;"><a href="http://allesausseraas.de/">http://allesausseraas.de/</a></strong>. Macht dort keinen Unsinn.</p>
</div>

