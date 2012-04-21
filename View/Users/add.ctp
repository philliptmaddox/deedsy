<!-- File: /app/View/Users/add.ctp -->
<?php $this->Html->css('deedsy.forms', null, array('inline' => false));?>
<div class="users form">	
<?php echo $this->Form->create('User');?>
<fieldset>
<legend><?php echo __('Add User');?></legend>	
<?php
echo $this->Form->input('email', array('label' => 'Email'));
echo $this->Form->input('first_name', array('label' => 'First Name'));
echo $this->Form->input('last_name', array('label' => 'Last Name'));
echo $this->Form->input('password', array('label' => 'Choose Password'));
echo $this->Form->input('password_confirm', array('label' => 'Confirm Password', 'type' => 'password'));
echo $this->Form->end('Let\'s Go');
?>
</fieldset>
</div>