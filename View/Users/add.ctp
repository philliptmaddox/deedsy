<!-- File: /app/View/Users/add.ctp -->
<?php $this->Html->css('deedsy.forms', null, array('inline' => false));?>

<div class="row span12">
	<img src="/img/join_dude.jpg" alt="Join Deedsy Dude" style="float:left;"/>
    <div class="span3" style="float:right;">
        <div class="users form" style="float:right">
        <img  style="margin-bottom: 20px;" src="/img/earn_25.jpg" alt="Earn 25 Deedsy Points"/>	
        <?php echo $this->Form->create('User');?>
        <fieldset>
        <?php
        echo $this->Form->input('email', array('label' => 'Email'));
        echo $this->Form->input('first_name', array('label' => 'First Name'));
        echo $this->Form->input('last_name', array('label' => 'Last Name'));
        echo $this->Form->input('password', array('label' => 'Choose Password'));
        echo $this->Form->input('password_confirm', array('label' => 'Confirm Password', 'type' => 'password'));
       	echo $this->Form->submit('/img/joinnow.png');
	    echo $this->Form->end();
        ?>
        </fieldset>
        </div>
	</div>
</div>
<div class="row">
	
</div>