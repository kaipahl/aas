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
	
		
	<div id="comments-header" class="clearfix">
	<?php if ('open' == $post-> comment_status) : ?>
	
		<h3><?php comments_number('<big>Keine</big> Kommentare','<big>1</big> Kommentar','<big>%</big> Kommentare' );?></h3>
	
		<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {  ?>
			<p>Sie können <a href="#respond">einen <strong>Kommentar</strong> hinterlassen</a>, oder <a href="<?php trackback_url(display); ?>">einen <strong>Trackback</strong> setzen</a>.</p>
			
			
		<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) { ?>
			<p>Die Kommentare sind geschlossen, aber Sie können <a href="<?php trackback_url(display); ?> ">einen Trackback setzen</a>.</p>
			
			
		<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) { ?>
			<p>Kommentare und Pings sind geschlossen.	</p>		
		<?php } ?>
		
		<p>Alle Kommentare in diesem Blog können per <strong><a href="<?php bloginfo_rss('comments_rss2_url'); ?>">RSS 2.0</a>-Feed</strong> abonniert werden.</p>
		
	<?php endif; ?>
	</div>
	





	<?php if ($comments) : ?>
	
		<ol id="commentlist">
		<?php foreach ($comments as $comment) : ?>
		
			<li class="comment <?php echo comment_author() ?>" id="comment-<?php comment_ID() ?>">
			
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




	<?php else : // this is displayed if there are no comments so far ?>

		<?php if ('open' == $post-> comment_status) : ?> 
		
		<?php else : // comments are closed ?>
			<p class="nocomments">Sorry, Kommentare sind, ebenso wie das Blog, bis auf weiteres geschlossen, da ich mich <a href="http://www.allesaussersport.de/archiv/2006/10/04/screensport-am-donnerstag-nur-die-wurst-hat-zwei/">aus 'technischen Gründen'</a> vorläufig nicht in der Lage sehe, das Blog weiter zu betreiben.</p>
		<?php endif; ?>

	<?php endif; ?>
	
</div>






<?php if ('open' == $post-> comment_status) : ?>

<div id="form-wrapper">
	<h3 id="respond">Kommentar schreiben</h3>
	
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post-999.php" method="post" id="commentform">
		
		<?php if ( $user_ID ) : ?>
		
			<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
		
		<?php else : ?>
		
			<div id="comment-description">
				<h4 id="description-switcher">Hinweise zum Kommentieren <span>&raquo;</span></h4>
				<div class="spalte hide">
					<p>Rudimentäre Auszeichnung via XHTML möglich. (&lt;b&gt;bold&lt;/b&gt; etc.)</p>
					<p>Aus Gründen des Spamschutzes muss vor dem Abschicken des Kommentars die untenstehende Checkbox angekreuzt werden. Kommentare können in der Moderationsschleife hängen bleiben. Kommentare mit bestimmten Schlüsselwörtern (z.B. 'viagra') werden als Spam aussortiert und ich habe dann kaum noch Zugriff darauf.</p>
					<p><strong>eMail-Adressen von hotmail.com werden automatisch aussortiert</strong>, da zirka 50% des Spams hotmail.com-Adressen angeben!</p>
				</div>
				<div class="spalte hide">
					<p>Ich behalte mir vor Kommentare zu löschen. Wer meint er könne hier per Dünnbrettbohrer-Kommentare einen Link wg. Googles PageRank auf seine Website legen, sollte bedenken dass ich seinen Kommentar mit einem Klick gelöscht habe, während er sich hier abmühen muss, die Felder auszufüllen. Schlechter Deal.</p>
					<p><a href="/datenschutz" target="_blank">Datenschutzerklärung bzgl. IP-Logging und Cookies</a></p>
				</div>
				<div class="clearer"></div>
			</div>
			
			<div class="form-element-wrapper">
				<label for="author">Name <small>&nbsp;</small></label>
				<input type="text" name="author" class="focus-switch form-text" id="author" value="<?php echo $comment_author; ?>" size="26" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
			</div>
			
			<div class="form-element-wrapper">
				<label for="email">eMail <small>(wird nicht veröffentlicht)</small></label>
				<input type="text" name="email" class="focus-switch form-text" id="email" value="<?php echo $comment_author_email; ?>" size="26" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
			</div>
			
			<div class="form-element-wrapper">
				<label for="url">Website <small>(freiwillig)</small></label>
				<input type="text" name="url" class="focus-switch form-text" id="url" value="<?php echo $comment_author_url; ?>" size="26" tabindex="3" />
			</div>
			
		<?php endif; ?>
			
		<div id="comment-text" class="form-element-wrapper">
			<label for="comment">Kommentar eingeben</label>
			<textarea name="comment" id="comment" cols="72" rows="10" tabindex="5" class="focus-switch"></textarea>
		</div>
		
		<?php if ( !$user_ID ) : ?>
		<div id="form-spamcheck-wrapper">
			<label for="dog_check_comment">Spam-Schutz! <strong>Checkbox muss angekreuzt sein!</strong></label> <input type="checkbox" name="dog_check_comment" class="styled" id="dog_check_comment" tabindex="4" value="angeklickt" />
		</div>
		<?php endif; ?>
		
		<div>
			<input name="submit" type="submit" id="submit" class="button" tabindex="6" value="Kommentar abschicken" />
			<?php comment_id_fields(); ?>
		</div>
		
		<script type="text/javascript">
		<!--
			$('#email').focus(function() {
				$('#dog_check_comment').attr('checked', true);
			});
			
			function hasText(el) {
				if (el.val() == '') {
					el.parent().removeClass('hastext');
				} else {
					el.parent().addClass('hastext');
				}
			}
			$('.focus-switch').each(function() {
				hasText($(this));
			});
			
			$('.focus-switch').focus(function() {
				$(this).parent().toggleClass('focus');
				hasText($(this));
			}).blur(function() {
				$(this).parent().toggleClass('focus');
				hasText($(this));
			});
			
			$('#form-wrapper H4').click(function() {
				var pointer = $(this).children('span').html();
				(pointer == '»') ? $(this).children('span').html('«') : $(this).children('span').html('»');
				$(this).siblings('.spalte').toggleClass('hide');
			})
		-->
		</script>
		
		<?php do_action('comment_form', $post->ID); ?>
			
		
	</form>

</div>

<?php endif; // if you delete this the sky will fall on your head ?>
