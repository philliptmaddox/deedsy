<!-- File: /app/View/Dashboard/index.ctp -->

<h1><?php echo($user['User']['email'])?></h1>
<p>Name: <?php echo $user['User']['first_name']?> <?php echo $user['User']['last_name']?></p>
<p>Created: <?php echo $user['User']['created']?></p>
<h2>Unclaimed Deeds</h2>
<table>
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Value</th>
        <th>Actions</th>
        <th>Created</th>
    </tr>
    <?php foreach ($unclaimedDeeds as $deed): ?>
	    <tr>
	        <td>
	            <?php echo $this->Html->link($deed['Deed']['name'], array('controller' => 'deeds', 'action' => 'view', $deed['Deed']['id'])); ?>
	        </td>
	        <td><?php echo $deed['Deed']['description']; ?></td>
	         <td><?php echo $deed['Deed']['value']; ?></td>
	         <td>
	         	<?php echo $this->Form->postLink(
	                'claim',
	                array('controller'=>'deeds','action' => 'claimdeed', $deed['Deed']['id']),
	                array('confirm' => 'Are you sure?'));
            	?>
            	<?php echo $this->Html->link("view", array('controller' => 'deeds', 'action' => 'view', $deed['Deed']['id'])); ?>
	         </td>
	        <td><?php echo $deed['Deed']['created']; ?></td>
	  </tr>
    <?php endforeach; ?>
</table>
<h2>My Created Deeds</h2>
<table>
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Value</th>
        <th>Actions</th>
        <th>Created</th>
    </tr>
    <?php foreach ($createdDeeds as $deed): ?>
	    <tr>
	        <td>
	            <?php echo $this->Html->link($deed['CreatedDeed']['name'], array('controller' => 'deeds', 'action' => 'view', $deed['CreatedDeed']['id'])); ?>
	        </td>
	        <td><?php echo $deed['CreatedDeed']['description']; ?></td>
	         <td><?php echo $deed['CreatedDeed']['value']; ?></td>
	         <td>
	        	<?php echo $this->Form->postLink(
	                'delete',
	                array('controller'=>'deeds','action' => 'delete', $deed['CreatedDeed']['id']),
	                array('confirm' => 'Are you sure?'));
            	?>
            	<?php echo $this->Html->link("view", array('controller' => 'deeds', 'action' => 'view', $deed['CreatedDeed']['id'])); ?>
          		<?php echo $this->Html->link("edit", array('controller' => 'deeds', 'action' => 'edit', $deed['CreatedDeed']['id'])); ?>
	         </td>
	        <td><?php echo $deed['CreatedDeed']['created']; ?></td>
	  </tr>
    <?php endforeach; ?>
</table>
<h2>My Claimed Deeds</h2>
<table>
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Value</th>
        <th>Actions</th>
        <th>Created</th>
    </tr>
    <?php foreach ($claimedDeeds as $deed): ?>
	    <tr>
	        <td>
	            <?php echo $this->Html->link($deed['ClaimedDeed']['name'], array('controller' => 'deeds', 'action' => 'view', $deed['ClaimedDeed']['id'])); ?>
	        </td>
	        <td><?php echo $deed['ClaimedDeed']['description']; ?></td>
	         <td><?php echo $deed['ClaimedDeed']['value']; ?></td>
	         <td>
            	<?php echo $this->Html->link("view", array('controller' => 'deeds', 'action' => 'view', $deed['ClaimedDeed']['id'])); ?>
	         </td>
	        <td><?php echo $deed['ClaimedDeed']['created']; ?></td>
	  </tr>
    <?php endforeach; ?>
</table>