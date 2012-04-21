<!-- File: /app/View/Users/add.ctp -->
<div class="users form">	
<?php echo $this->Form->create('User');?>
<fieldset>
<legend><?php echo __('Add User');?></legend>	
<?php
echo $this->Form->input('email');
echo $this->Form->input('first_name');
echo $this->Form->input('last_name');
echo $this->Form->input('password');
echo $this->Form->input('password_confirm');
echo $this->Form->end('Save User');
?>
</fieldset>
</div>