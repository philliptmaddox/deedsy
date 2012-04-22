<!-- File: /app/View/Deeds/review.ctp -->
<div class="row">
	<div class="well span 12">
		<h1>Help, <?=$deed['DeedCreator']['first_name']?> with his deed!</h1>
		<p>Your Friend, Ben needs a favor. Around here we call it a deed. Deedsy is a good deed engine. Earn points for doing good deeds. You can start here by accepting Ben's deed!</p>
	</div>
</div>
<style type="text/css">
	.deedDescription {
		border: 1px solid #d1d1d1;
		box-shadow: 3px;
		min-height: 175px;
	}
	.deedDescription h2 {
		background-color: #640663;
		color: #FFFFFF;
		padding: 20px;
	}
	.deedDescription p {
		padding: 20px;
	}
	.deedValue {
		float: right;
		width: 100px;
		font-size: 32px;
		color: #EDBA08;
		background: transparent url(/img/halo1.png) no-repeat 15px 33px;
		padding-bottom: 30px;
		text-align: center;
		margin-right: 12px;
	}
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
    </div>
</div>