<!-- File: /app/View/Users/add.ctp -->

<h1>Add User</h1>
<?php
echo $this->Form->create('User');
echo $this->Form->input('email');
echo $this->Form->input('first_name');
echo $this->Form->input('last_name');
echo $this->Form->input('password');
echo $this->Form->input('password_confirm');
echo $this->Form->end('Save User');
?>