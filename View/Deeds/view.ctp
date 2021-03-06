<!-- File: /app/View/Deeds/review.ctp -->
<div class="row">
	<?php if (!isset($user) || $deed['Deed']['creator_user_id'] != $user['User']['id']) : ?>
<!-- Facebook
			Here's where we're going to put the "Like" button for Facebook --> 
			<!-- <div class="fb-like" data-send="true" data-width="940" data-show-faces="true" data-font="verdana"></div> -->
			<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fdeedsy.com&amp;send=false&amp;layout=standard&amp;width=450&amp;show_faces=false&amp;font=verdana&amp;colorscheme=light&amp;action=like&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:940px; height:40px;" allowTransparency="true"></iframe>
	<!-- End Facebook Like -->
	<div class="well span12">
		<h1>Help with <?=$deed['DeedCreator']['first_name']?>'s deed!</h1>
		<p>Your Friend, <?=$deed['DeedCreator']['first_name']?> needs a favor. Around here we call it a deed. Deedsy is a good deed engine. Earn points for doing good deeds. You can start here by accepting <?=$deed['DeedCreator']['first_name']?>'s deed!</p>
	</div>
	<?php endif; ?>
</div>
<style type="text/css">
	
</style>

<div class="row">
    <div class="deedDescription span7">
        <h2><?=$deed['Deed']['name']?></h2>
    	<div class="deedValue">
	    	+<?=$deed['Deed']['value']?>
    	</div>
    	<p><?=$deed['Deed']['description']?></p>
    	<p>Expires on <span><?=$deed['Deed']['expires']?></span></p>
    </div>
    <div class="span4">
	<?php if (!isset($user) || $deed['Deed']['creator_user_id'] != $user['User']['id']) : ?>
            <?php echo $this->Form->postLink(
        							$this->Html->image('Igotthis_button.jpg'), 
        							array('controller' => 'deeds','action' => 'claimdeed',$deed['Deed']['id']),
        							array('escape' => false , 'confirm' => 'are you sure?')); ?>

    	<div>
    		<h2>Earn +<?=$deed['Deed']['value']?> points</h2>
    		<p><a href="/about"><em>What the heck are Deedsy points?</em></a></p>
    	
    	</div>
	<!--     	<img style="float: right; margin-top: -100px; z-index: 100; position: relative;" src="/img/large_kitty_noring.png" alt="huge kitty"/> -->
	<?php else: ?>
	    <?php echo $this->Html->link('Edit', array('controller' => 'deeds', 'action' => 'edit', $deed['Deed']['id'])); ?> | 
	    <?php echo $this->Form->postLink('Delete', array('controller' => 'deeds', 'action' => 'delete', $deed['Deed']['id']), array('confirm' => 'are you sure?')); ?>
        <?php endif; ?>
        
    <!-- FB Share -->
		<fb:send ref="top_left"></fb:send>

	<!-- Twitter -->
		<a href="https://twitter.com/share" class="twitter-share-button" data-text="Do a good deed on Deedsy: <?=$deed['Deed']['name']?> <? echo $this->Html->url( null, true ); ?>" data-size="large" data-count="none" data-dnt="true">Tweet</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>	
	<!--End Twitter -->
    </div>
</div>
