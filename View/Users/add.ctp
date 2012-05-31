<!-- File: /app/View/Users/add.ctp -->
<?php $this->Html->css('deedsy.forms', null, array('inline' => false));?>

<div class="row span2">
	<div class="banner"></div>
</div>
<div class="row span9">
	<img src="/img/deedsyfavor.jpg" alt="Deedsy Points Example" style="float:left;"/>
    <div class="span3" style="float:left;">
        <div class="users form" style="float:left">	
        <?php echo $this->Form->create('User');?>
        <fieldset>
        <legend>Join Deedsy</legend>	
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
	<img style="margin: -100px 0 0 744px" src="/img/kitty_noring.png" alt="Everyone Loves Cats!"/>

<div class="row">
	
</div>