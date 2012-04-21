<?php
<<<<<<< HEAD
echo $rss->header();

=======
>>>>>>> 389c27c68f134006ca5d9db88c9f1372694f777f
if (!isset($channel)) {
	$channel = array();
}
if (!isset($channel['title'])) {
	$channel['title'] = $title_for_layout;
}

<<<<<<< HEAD
echo $rss->document(
	$rss->channel(
		array(), $channel, $content_for_layout
	)
);

?>
=======
echo $this->Rss->document(
	$this->Rss->channel(
		array(), $channel, $content_for_layout
	)
);
?>
>>>>>>> 389c27c68f134006ca5d9db88c9f1372694f777f
