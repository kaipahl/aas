<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
 
 // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

		/* This variable is for alternating comment background */
		$oddcomment = 'graybox';
?>

<!-- You can start editing here. -->


<div id="comments">
	
		
	<?php if ('open' == $post-> comment_status) : ?>
	
		<p id="description"> <!-- ...... Intro ........... -->
			<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) { // KOMMENTARE und PINGs ?>
				Sie können <a href="#respond">einen Kommentar hinterlassen</a>, oder <a href="<?php trackback_url(display); ?>">einen Trackback setzen</a>.
			<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) { 	// Nur PINGs ?>
				Die Kommentare sind geschlossen, aber Sie können <a href="<?php trackback_url(display); ?> ">einen Trackback setzen</a>.
			<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) { // Keine KOMMENTARE, keine PINGs ?>
				Kommentare und Pings sind geschlossen.			
			<?php } ?> Alle Kommentare in diesem Blog können per <a href="<?php bloginfo_rss('comments_rss2_url'); ?>">RSS 2.0</a>-Feed abonniert werden.
		</p>
		
	<?php endif; ?>
	
	
	<h3><?php comments_number('Keine Kommentare','Ein Kommentar','% Kommentare' );?></h3>


	<?php if ($comments) : ?>
	
		<!-- bbmark =========== START Meta =========== -->
		<ol id="commentlist">
		<?php foreach ($comments as $comment) : ?>
		
			<!-- bbmark =========== START Kommentar =========== -->
			<li class="comment <?php echo comment_author() ?>" id="comment-<?php comment_ID() ?>">
				<ul class=" labels comment-meta">
					<li style="width: 115px;"><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_type('Kommentar', 'Trackback', 'Pingback'); ?></a></li>
					<li style="width: 178px;"><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_time('D, j M Y, G:i') ?></a></li>
					<li class="comment-author"><span><?php comment_author_link() ?> <?php edit_comment_link('Edit'); ?></span></li>
				</ul> <!-- .comment-meta -->
				<div class="clearer"></div>
				<?php comment_text() ?>
			</li>
			<!-- =========== ENDE Kommentar =========== -->
			
			<?php /* Changes every other comment to a different class */	
				if('graybox' == $oddcomment) {$oddcomment="";}
				else { $oddcomment = "graybox"; }
			?>
	
		<?php endforeach; /* end for each comment */ ?>	
		</ol>


	<?php else : // this is displayed if there are no comments so far ?>

		<?php if ('open' == $post-> comment_status) : ?> 
			<!-- If comments are open, but there are no comments. -->
		
		<?php else : // comments are closed ?>
			<!-- If comments are closed. -->
			<!-- p class="nocomments">Kommentare sind geschlossen.</p -->
			<p class="nocomments">Sorry, Kommentare sind, ebenso wie das Blog, bis auf weiteres geschlossen, da ich mich <a href="http://www.allesaussersport.de/archiv/2006/10/04/screensport-am-donnerstag-nur-die-wurst-hat-zwei/">aus 'technischen Gründen'</a> vorläufig nicht in der Lage sehe, das Blog weiter zu betreiben.</p>
		<?php endif; ?>

	<?php endif; ?>
	
</div>

<?php if ('open' == $post-> comment_status) : ?>

<div id="form">
	<h3 id="respond">Kommentar schreiben</h3>
	
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post-999.php" method="post" id="commentform">
		<!-- p>Sorry, Kommentare sind, ebenso wie das Blog, bis auf weiteres geschlossen, da ich mich <a href="http://www.allesaussersport.de/archiv/2006/10/04/screensport-am-donnerstag-nur-die-wurst-hat-zwei/">aus 'technischen Gründen'</a> vorläufig nicht in der Lage sehe, das Blog weiter zu betreiben.</p -->
		
		<?php if ( $user_ID ) : ?>
		
			<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
		
		<?php else : ?>
		
			<div id="comment-description">
				<!-- div style="color: red; padding: 0.5em 1em;">
					BITTE FÜR EINEN MOMENT NICHT KOMMENTIEREN!!!! <br /> SPAM-TEST IM GANGE!
				</div -->
				<div class="spalte">
					<p>Rudimentäre Auszeichnung via XHTML möglich. (&lt;b&gt;bold&lt;/b&gt; etc.)</p>
					<p>Aus Gründen des Spamschutzes muss vor dem Abschicken des Kommentars die untenstehende Checkbox angekreuzt werden. Kommentare können in der Moderationsschleife hängen bleiben. Kommentare mit bestimmten Schlüsselwörtern (z.B. 'viagra') werden als Spam aussortiert und ich habe dann kaum noch Zugriff darauf.</p>
					<p><strong>eMail-Adressen von hotmail.com werden automatisch aussortiert</strong>, da zirka 50% des Spams hotmail.com-Adressen angeben!</p>
				</div>
				<div class="spalte">
					<p>Ich behalte mir vor Kommentare zu löschen. Wer meint er könne hier per Dünnbrettbohrer-Kommentare einen Link wg. Googles PageRank auf seine Website legen, sollte bedenken dass ich seinen Kommentar mit einem Klick gelöscht habe, während er sich hier abmühen muss, die Felder auszufüllen. Schlechter Deal.</p>
					<p><a href="/datenschutz" target="_blank">Datenschutzerklärung bzgl. IP-Logging und Cookies</a></p>
				</div>
				<div class="clearer"></div>
			</div>
			
			<p>
				<label for="rizza">Name</label><br />
				<input type="text" name="author" class="styled" id="author" value="<?php echo $comment_author; ?>" size="26" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
			</p>
			
			<p style="float: left;">
				<label for="email">eMail <small>(wird nicht veröffentlicht)</small></label><br />
				<input type="text" name="email" class="styled" id="email" value="<?php echo $comment_author_email; ?>" size="26" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
			</p>
			
			<p style="float: right;">
				<label for="url">Website <small>(freiwillig)</small></label><br />
				<input type="text" name="url" class="styled" id="url" value="<?php echo $comment_author_url; ?>" size="26" tabindex="3" />
			</p>
			<p>
				<label for="dog_check_comment">Zum Spam-Schutz bitte die <strong>Checkbox ankreuzen</strong></label> <input type="checkbox" name="dog_check_comment" class="styled" id="dog_check_comment" tabindex="4" value="angeklickt" />
			</p>
			
		<?php endif; ?>
			
		<p>
			<textarea name="comment" id="comment" cols="72" rows="16" tabindex="5" class="styled" ></textarea>
		</p>
		
		<p>
			<input name="submit" type="submit" id="submit" tabindex="6" value="Kommentar abschicken" />
			<?php comment_id_fields(); ?>
		</p>
		
		<?php do_action('comment_form', $post->ID); ?>
			
		
	</form>


</div> <!-- /.form -->

<?php endif; // if you delete this the sky will fall on your head ?>
