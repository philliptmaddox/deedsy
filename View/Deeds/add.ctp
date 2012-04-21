<!-- File: /app/View/Users/add.ctp -->

<h1>Add Deed</h1>
<?php
echo $this->Form->create('Deed');
echo $this->Form->input('name');
echo $this->Form->input('description');
echo $this->Form->input('value');
echo $this->Form->input('creator_user_id');
echo $this->Form->input('actor_user_id');
echo $this->Form->end('Save User');
?>