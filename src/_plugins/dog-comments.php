<?php
/*
Plugin Name: Dogfood Comments
Plugin URI: http://dogfood.kaipahl.de/
Description: Retrieves a list of the most recent comments.
Version: 1.0
Author: Kai Pahl
Author URI: http://www.kaipahl.de/
*/

define(MAX_COMMENTS, 500);

function dog_comments($no_threads = 7, $comment_lenth = 5, $before = '<li>', $after = '</li>', $show_pass_post = false, $comment_style = 0) {
    global $wpdb;
	
	$request = "SELECT ID, comment_ID, comment_post_ID, comment_author, post_title, comment_date
    FROM ".$wpdb->comments."  
	LEFT JOIN ".$wpdb->posts." 
	ON ".$wpdb->posts.".ID=".$wpdb->comments.".comment_post_ID 
    WHERE comment_approved = '1' 
    ORDER BY comment_ID DESC
    LIMIT ".MAX_COMMENTS;
	
	$threads = $wpdb->get_results($request);
	if (count($threads)<1) {
		echo '<div style="color: #992222; padding-left: 20px;">(Kommentaranzeige wg. Serverlast bis 18h ausgeschaltet</div>';
		return;
	}
    $geradeUngerade = 1;
    $ID_array = array();
    $i = 0;
    
	while (count($ID_array) < $no_threads) {
		if ($i>=MAX_COMMENTS) break;
		$comment = $threads[$i];
		$comment_post_ID = $comment->ID;
    	
    	$is_noregret = false;
    	if (strtolower($comment->comment_author) == 'noregret')
    		$is_noregret = true;
    	if (strtolower($comment->comment_author) == 'grobigrobig')
    		$is_noregret = true;
    	
		if (!in_array($comment_post_ID, $ID_array) && !$is_noregret) {
			array_push($ID_array, $comment_post_ID);
			// DB-Abfrage
			$request = "SELECT comment_ID, comment_post_ID 
			FROM ".$wpdb->comments." 
			WHERE comment_post_ID = '$comment_post_ID' 
			AND comment_approved = '1'";
			$allCommentsFromThread = $wpdb->get_results($request);
				
			// Variablen
			$output = '';
			$geradeUngerade = 1-$geradeUngerade;
			$permalink = get_permalink($comment->ID);
			$commentPermalink = $permalink."#comment-".$comment->comment_ID;
			$commentAnzahl = count($allCommentsFromThread);
			$commentTitle = $comment->post_title;
			$commentAuthor = $comment->comment_author;
			$commentDate = $comment->comment_date;
			
			$commentTimestamp = mktime(0, 0, 0, subStr($commentDate, 5, 2), subStr($commentDate, 8, 2), subStr($commentDate, 0, 4));
			$nowDate = getDate();
			$nowTimestamp = mktime(0, 0, 0, $nowDate["mon"], $nowDate["mday"], $nowDate["year"]);
			
			$diff_seconds = $nowTimestamp - $commentTimestamp;
			$diff_days = floor($diff_seconds/86400);
			
			switch($diff_days) {
				case -1:
					$tageStr = 'heute';
					break;
				case 0:
					$tageStr = 'heute';
					break;
				case 1:
					$tageStr = 'gestern';
					break;
				case 2:
					$tageStr = 'vorgestern';
					break;
				default:
					$tageStr = 'vor '. $diff_days . ' Tagen';
					break;
			}
			$commentUhrzeit = substr($commentDate, 11, 2) . 'h' . substr($commentDate, 14,2);
			if ($commentAnzahl == 1) {
				$commentAnzahlStr = ' Kommentar';
			} else {
				$commentAnzahlStr = ' Kommentare';
			}
		
			// OutputString
			if ($geradeUngerade == 1) {
				$output = $output . '<li class="comments odd clearfix">';
			} else {
				$output = $output . '<li class="comments even clearfix">';
			}
			$output = $output . '<div class="comments-nr">'.$commentAnzahl.'</div><div class="comment-meta"><h3><a href="'.$permalink.'">' . $commentTitle . "</a></h3>\n\t\t\t\t\t";
			$output = $output . '<p><a href="'.$commentPermalink.'">'. $tageStr . ' '. $commentUhrzeit.'</a> | '.$commentAuthor.'</p></div>';
			$output = $output . "</li>\n\t\t\t\t";
			//
			echo $output;
		}
		$i++;
    }
    //echo '';
    
}
?>