<?php
/**
 * dog-Templates functions and definitions
 *
 * In Wordpress werden inzwischen Teile des templates in der functions.php initialisiert.
 * Fuer weitere Informationen in den functions.php der mitgelieferten WP-templates reinschnuppern.
 *
 * @package WordPress
 * @subpackage aas-evolution2011
 * @since AAS-Evolution 2011 1.0
 */

/**
 * Tell WordPress to run twentyeleven_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'dog_setup' );

if ( ! function_exists( 'twentyeleven_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @since AAS-Evolution 2011 1.0
 */
function dog_setup() {

	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );

}
endif; // dog_setup


function dog_comments2() {
    global $wpdb;
	
	$request = "
		SELECT comment_post_ID, COUNT(comment_ID) AS comment_counter
		FROM ( 
			SELECT comment_post_ID, comment_ID, comment_date
			FROM ".$wpdb->comments." 
			WHERE comment_approved = '1' 
			ORDER BY comment_ID DESC 
			LIMIT 500 
		) as T
		GROUP BY comment_post_ID
		ORDER BY T.comment_date DESC;";
	
	$threads = $wpdb->get_results($request);

	$numberOfThreads = count($threads);
	for ($i=0; $i<$numberOfThreads; $i++) {
		$commentPostID = $threads[$i]->comment_post_ID;
		$commentCount = $threads[$i]->comment_counter;
		$postTitle = get_the_title($commentPostID);
		$postLink = get_permalink($commentPostID);
		$comments = get_comments(array(
			'post_id' => $commentPostID,
			'status' => 'approve',
			'number' => 1
		));
		$commentDate = $comments[0]->comment_date;
		$commentAuthor = $comments[0]->comment_author;
		$commentID = $comments[0]->comment_ID;
		$commentLink = $postLink . '#comment-' . $commentID;
		echo '<div>';
		echo '<div>' . $commentCount . '</div>';
		echo '<div><a href="'.$postLink.'">' . $postTitle . '</a></div>';
		echo '<div><a href="'.$commentLink.'">' . $commentDate . '</a>, <a href="'.$commentLink.'">' . $commentAuthor . '</a></div>';
		echo '</div>';
	}
}


// ==============================================
function dog_comments2a() {
    global $wpdb;
	
	$request = "
		SELECT comment_post_ID
		FROM ( 
			SELECT comment_post_ID, comment_date
			FROM ".$wpdb->comments." 
			WHERE comment_approved = '1' 
			ORDER BY comment_ID DESC 
			LIMIT 500 
		) as T
		GROUP BY comment_post_ID
		ORDER BY T.comment_date DESC;";
	
	$threads = $wpdb->get_results($request);

	$numberOfThreads = count($threads);
	for ($i=0; $i<$numberOfThreads; $i++) {
		$commentPostID = $threads[$i]->comment_post_ID;
		$commentCount = get_comments_number($commentPostID);
		$postTitle = get_the_title($commentPostID);
		$postLink = get_permalink($commentPostID);
		$comments = get_comments(array(
			'post_id' => $commentPostID,
			'status' => 'approve',
			'number' => 1
		));
		$commentDate = $comments[0]->comment_date;
		$commentAuthor = $comments[0]->comment_author;
		$commentID = $comments[0]->comment_ID;
		$commentLink = $postLink . '#comment-' . $commentID;
		echo '<div>';
		echo '<div>' . $commentCount . '</div>';
		echo '<div><a href="'.$postLink.'">' . $postTitle . '</a></div>';
		echo '<div><a href="'.$commentLink.'">' . $commentDate . '</a>, <a href="'.$commentLink.'">' . $commentAuthor . '</a></div>';
		echo '</div>';
	}
}


// ==============================================
function dog_comments2b() {
    global $wpdb;
	
	$request = "
		SELECT DISTINCT comment_post_ID
		FROM ( 
			SELECT comment_post_ID, comment_date
			FROM ".$wpdb->comments." 
			WHERE comment_approved = '1' 
			ORDER BY comment_ID DESC 
			LIMIT 500 
		) as T
		ORDER BY T.comment_date DESC;";
	
	$threads = $wpdb->get_results($request);

	$numberOfThreads = count($threads);
	for ($i=0; $i<$numberOfThreads; $i++) {
		$commentPostID = $threads[$i]->comment_post_ID;
		$commentCount = get_comments_number($commentPostID);
		$postTitle = get_the_title($commentPostID);
		$postLink = get_permalink($commentPostID);
		$comments = get_comments(array(
			'post_id' => $commentPostID,
			'status' => 'approve',
			'number' => 1
		));
		$commentDate = $comments[0]->comment_date;
		$commentDateTS = strtotime($commentDate);
		$timeStr = date('H', $commentDateTS) .'h'. date('i', $commentDateTS);
		
		$today = date('Y-m-d', strtotime('today'));
		$yesterday = date('Y-m-d', strtotime('yesterday'));
		
		if ($commentDate >= $today) {
			$dateStr = "Heute";
		} else if ($commentDate >= $yesterday) {
			$dateStr = "Gestern";
		} else {
			$weekday = array('Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag');
			$dw = date('w', $commentDateTS);
			
			$dateStr = $weekday[$dw];
		}

		$commentAuthor = $comments[0]->comment_author;
		$commentID = $comments[0]->comment_ID;
		$commentLink = $postLink . '#comment-' . $commentID;
		echo '<li class="comments clearfix">';
		echo '<div class="comments-nr">' . $commentCount . '</div>';
		echo '<div class="comment-meta">';
		echo '<h3><a href="'.$postLink.'">' . $postTitle . '</a></h3>';
		echo '<p><a href="'.$commentLink.'">' . $dateStr . ' ' . $timeStr . '</a> | ' . $commentAuthor . '</p>';
		echo '</div>';
		echo '</li>';
	}
}




// ==============================================
function dog_comments3() {
    global $wpdb;
	
	$request = "
		SELECT DISTINCT comment_post_ID    
		FROM ".$wpdb->comments."  
		WHERE comment_approved = '1'
		ORDER BY comment_date DESC
		LIMIT 5;";
	
	$threads = $wpdb->get_results($request);

	$numberOfThreads = count($threads);
	for ($i=0; $i<$numberOfThreads; $i++) {
		$commentPostID = $threads[$i]->comment_post_ID;
		$commentCount = get_comments_number($commentPostID);
		$postTitle = get_the_title($commentPostID);
		$postLink = get_permalink($commentPostID);
		$comments = get_comments(array(
			'post_id' => $commentPostID,
			'status' => 'approve',
			'number' => 1
		));
		$commentDate = $comments[0]->comment_date;
		$commentAuthor = $comments[0]->comment_author;
		$commentID = $comments[0]->comment_ID;
		$commentLink = $postLink . '#comment-' . $commentID;
		echo '<div>';
		echo '<div>' . $commentCount . '</div>';
		echo '<div><a href="'.$postLink.'">' . $postTitle . '</a></div>';
		echo '<div><a href="'.$commentLink.'">' . $commentDate . '</a>, <a href="'.$commentLink.'">' . $commentAuthor . '</a></div>';
		echo '</div>';
	}
}




// ==============================================
function dog_comments4() {
    global $wpdb;
	
	$request = "
		SELECT comment_post_ID
	    FROM ".$wpdb->comments."  
		WHERE comment_approved = '1'
		GROUP BY comment_post_ID
	    ORDER BY comment_ID DESC
	    LIMIT 5;";
	
	$threads = $wpdb->get_results($request);

	$numberOfThreads = count($threads);
	for ($i=0; $i<$numberOfThreads; $i++) {
		$commentPostID = $threads[$i]->comment_post_ID;
		$commentCount = get_comments_number($commentPostID);
		$postTitle = get_the_title($commentPostID);
		$postLink = get_permalink($commentPostID);
		$comments = get_comments(array(
			'post_id' => $commentPostID,
			'status' => 'approve',
			'number' => 1
		));
		$commentDate = $comments[0]->comment_date;
		$commentAuthor = $comments[0]->comment_author;
		$commentID = $comments[0]->comment_ID;
		$commentLink = $postLink . '#comment-' . $commentID;
		echo '<div>';
		echo '<div>' . $commentCount . '</div>';
		echo '<div><a href="'.$postLink.'">' . $postTitle . '</a></div>';
		echo '<div><a href="'.$commentLink.'">' . $commentDate . '</a>, <a href="'.$commentLink.'">' . $commentAuthor . '</a></div>';
		echo '</div>';
	}
}