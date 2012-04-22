<!-- File: /app/View/elements/review_deed.ctp -->
<div>
	<h1>Deed Preview</h1>
    <p>Congratulations! Below is a preview of your deed. Click "Share it" to spread the word about your Deed.</p>
    <?php echo $this->Html->link("Share", array('controller' => 'deeds', 'action' => 'share', $deed['Deed']['id']), array('class' => 'show-share')); ?>
</div>
<?php echo $this->Html->link("Edit", array('controller' => 'deeds', 'action' => 'edit', $deed['Deed']['id']), array('class' => 'show-share')); ?> | 
<?php echo $this->Form->postLink('Delete', array('controller' => 'deeds', 'action' => 'delete', $deed['Deed']['id']), array('confirm' => 'are you sure?')); ?>
