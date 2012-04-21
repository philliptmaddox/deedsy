<!-- File: /app/View/Users/add.ctp -->
<?php $this->Html->css('deedsy.forms', null, array('inline' => false));?>

<div class="deeds form a">
    <fieldset>
        <div>Create a Deed Image</div>	
        <?php
        echo $this->Form->create('Deed');
        echo $this->Form->input('name', array('label' => 'Title:'));
        echo $this->Form->input('description', array('label' => 'Description:<br/><em>250 char limit</em>'));
        echo $this->Form->input('value', array('label' => 'Points you\'ll give:'));
        echo $this->Form->end('Create Deed');
        ?>
    </fieldset>
</div>