<!-- File: /app/View/elements/review_deed.ctp -->
<div class="well">
	<h1>Deed Preview</h1>
    <p>Congratulations! Below is a preview of your deed. Click "Share it" to spread the word about your Deed.</p>
    <?php echo $this->Html->link("Share", array('controller' => 'deeds', 'action' => 'share', $deed['Deed']['id']), array('class' => 'show-share')); ?>
</div>
<hr />
