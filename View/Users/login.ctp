<div>
	<h2>Please enter your username and password</h2><hr />
</div>
<div class="span7">
	<?php echo $this->Session->flash('auth'); ?>
	<?php echo $this->Form->create('User');?>
	    <fieldset>
		    <?php
		        echo $this->Form->input('email');
		        echo $this->Form->input('password');
		    ?>
	    </fieldset>
	<?php echo $this->Form->end(__('Login'));?>
</div>
<div class="span4">
	<?php echo __('<h3>Not a Member?</h3><a href="add"><img src="/img/joinnow.png" alt="Join Deedsy!"/></a>'); ?>
</div>