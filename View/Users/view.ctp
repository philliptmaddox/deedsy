<!-- File: /app/View/Users/view.ctp -->

<h1><?php echo($user['User']['email'])?></h1>
<p>Name: <?php echo $user['User']['first_name']?> <?php echo $user['User']['last_name']?></p>
<p>Created: <?php echo $user['User']['created']?></p>
<h2>My Created Deeds</h2>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Description</th>
        <th>Value</th>
        <th>Created</th>
    </tr>
    <?php foreach ($createdDeeds as $deed): ?>
	    <tr>
	        <td><?php echo $deed['CreatedDeed']['id']; ?></td>
	        <td>
	            <?php echo $this->Html->link($deed['CreatedDeed']['name'], array('controller' => 'deeds', 'action' => 'view', $deed['CreatedDeed']['id'])); ?>
	        </td>
	        <td><?php echo $deed['CreatedDeed']['description']; ?></td>
	         <td><?php echo $deed['CreatedDeed']['value']; ?></td>
	        <td><?php echo $deed['CreatedDeed']['created']; ?></td>
	  </tr>
    <?php endforeach; ?>
</table>