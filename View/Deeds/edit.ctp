<!-- File: /app/View/Users/add.ctp -->
<?php $this->Html->css('deedsy.forms', null, array('inline' => false));?>
<?php 
	$tags = $this->request->data['Tag'];
	$strTags = '';
	foreach($this->request->data['Tag'] as $tag){
		if ($strTags == ''){
			$strTags = $tag['name'];
		} else {
			$strTags = $strTags .','. $tag['name'];
		} 
	}
	$this->request->data['Deed']['tags'] = $strTags;
?>
<div class="deeds form a">
    <fieldset>
        <div>Create a Deed Image</div>	
        <?php
        echo $this->Form->create('Deed');
        echo $this->Form->input('name', array('label' => 'Title:'));
        echo $this->Form->input('description', array('label' => 'Description:<br/><em>250 char limit</em>'));
        echo $this->Form->input('value', array('label' => 'Points you\'ll give:'));
        echo $this->Form->input('expires', array(
            'label' => 'Expiration date:',
            'minYear' => date('Y'),
            'maxYear' => date('Y') + 1,
            'interval' => 15,
            'empty' => true,
        ));
        echo $this->Form->input('tags', array('label' => 'Tags (comma sepated):'));
        echo $this->Form->end('Create Deed');
        ?>
    </fieldset>
</div>
