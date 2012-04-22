<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo __('<h2>Please enter your username and password</h2><br />
        <div class="row span4 offset6"><h3>Not a Member?</h3><a href="add"><img src="/img/joinnow.png" alt="Join Deedsy!"/></a></div>'); ?></legend>
    <?php
        echo $this->Form->input('email');
        echo $this->Form->input('password');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login'));?>
</div>