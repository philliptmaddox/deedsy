<!-- File: /app/View/Deeds/share.ctp -->
<h1>Choose Your Sharing Method</h1>
<?php 
	echo $this->Form->create('Share');
	echo $this->Form->input('email', array('label' => 'Email'));
	echo "<input type='text' value='http://deedsy.codeandcountry.com/deeds/view/".$deed['Deed']['id']."' name='link' id='link'/>";
	echo $this->Form->end('Share It');
?>