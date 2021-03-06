<!-- File: /app/View/Deeds/index.ctp -->

<h1>Deeds</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Description</th>
        <th>Value</th>
        <th>Tags</th>
        <th>Created</th>
        <th>Expires</th>
    </tr>

    <!-- Here is where we loop through our $deeds array, printing out deed info -->

    <?php foreach ($deeds as $deed): ?>
    <tr>
        <td><?php echo $deed['Deed']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($deed['Deed']['name'],
array('controller' => 'deeds', 'action' => 'view', $deed['Deed']['id'])); ?>
        </td>
        <td><?php echo $deed['Deed']['description']; ?></td>
        <td><?php echo $deed['Deed']['value']; ?></td>
        <td>
		<?php 
			$tags = "";
			foreach($deed['Tag'] as $tag){
				$tags .= $tag['name'].", ";
			}
			echo substr($tags, 0, strlen($tags)-2);
		?>
        </td>
        <td><?php echo $deed['Deed']['created']; ?></td>
        <td><?php echo empty($deed['Deed']['expires']) ? 'never' : $deed['Deed']['expires']; ?></td>
    </tr>
    <?php endforeach; ?>

</table>
