<?php

// I've got 20 #deedsy points for someone to watch my cat while I'm gone.
// @benstucki Awesome. They're yours. #deedsy +20
// 

$json = file_get_contents('http://search.twitter.com/search.json?q=from:phillipmaddox%20%23deedsy');
$object = json_decode($json);

// 127.0.0.1:3306
$connection = mysql_connect("127.0.0.1:8887","deedsy","hacknashville");
if (!$connection)
{
  die('Could not connect: ' . mysql_error());
}

updateDeeds($object->results);
mysql_close($connection);

echo $json;


function updateDeeds($items) {
	
	foreach ($items as $item) {
		
		$query = "SELECT * FROM flash_deedsy.deeds WHERE tweet_id='" . $item->id . "';";
		$result = mysql_query($query);
		if (!$result) {
	    	die('Invalid query: ' . mysql_error());
		}
		
		echo $query;
		
		$rows = mysql_num_rows($result);
		if($rows == 0) {
			
			$deed_value = getDeedsValue($item->text);
			echo $deed_value;
			
			// get related user
			$deed_user = getUserByTwitter($item->from_user);
			echo $deed_user;
			
			
	    	// add deed
			$query = "INSERT INTO flash_deedsy.deeds (name, description, value, creator_user_id, status_id, created, modified, tweet_id) VALUES ('" . $item->text . "', '" . $item->text . " (from <a href=\'http://twitter.com/" . $item->from_user . "\' target=\'_blank\'>" . $item->from_user . "</a>)', " . $deed_value . ", " . $deed_user . ", 1, now(), now(), " . $item->id . ");";
			
			echo $query;
			
			$result = mysql_query($query);
			if (!$result) {
		    	die('Invalid query: ' . mysql_error());
			}
			
			echo $query;
			
		}
		
	}
	
}

function getDeedsValue($description) {
	$tokens = str_split($description);
	foreach ($tokens as $token) {
		$value = (float)$token;
		if($value > 0) {
			return $value;
		}
	}
	return 0;
}

function getUserByTwitter($twitter_name) {
	$id = 0;
	$query = "SELECT * FROM flash_deedsy.users WHERE twitter_account_name='" . $twitter_name . "';";
	$result = mysql_query($query);
	if (!$result) {
    	die('Invalid query: ' . mysql_error());
	}
	
	echo $query;
	
	$rows = mysql_num_rows($result);
	if($rows == 0) {
		/*
		// add user
		$query = "INSERT INTO flash_deedsy.deeds (name, description, value, creator_user_id, status_id, created, modified, tweet_id) VALUES ('from twitter', '" . $item->text . "', " . $deed_value . ", " . $deed_user . ", 1, now(), now(), " . $item->id . ");";
		
		$result = mysql_query($query);
		if (!$result) {
	    	die('Invalid query: ' . mysql_error());
		}
		
		echo $query;
		*/
	} else {
		$row = mysql_fetch_assoc($result);
		$id = $row['id'];
	}
	return $id;
}

?>