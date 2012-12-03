<!-- File: /app/View/Deeds/review.ctp -->
<div class="row">
	<div class="well span 12">
		<h1>Help with <?=$deed['DeedCreator']['first_name']?>'s deed!</h1>
		<p>Your Friend, <?=$deed['DeedCreator']['first_name']?> needs a favor. Around here we call it a deed. Deedsy is a good deed engine. Earn points for doing good deeds. You can start here by accepting <?=$deed['DeedCreator']['first_name']?>'s deed!</p>
	</div>
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
    </div>
    <div class="span4">
        <?php echo $this->Form->postLink(
        							$this->Html->image('Igotthis_button.jpg'), 
        							array('controller' => 'deeds','action' => 'claimdeed',$deed['Deed']['id']),
        							array('escape' => false , 'confirm' => 'are you sure?')); ?>
    	<div>Earn +<?=$deed['Deed']['value']?> points</div>
<!--     	<img style="float: right; margin-top: -100px; z-index: 100; position: relative;" src="/img/large_kitty_noring.png" alt="huge kitty"/> -->
    </div>
</div>