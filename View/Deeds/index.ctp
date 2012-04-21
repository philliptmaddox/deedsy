<!-- File: /app/View/Deeds/index.ctp -->

<h1>Deeds</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Value</th>
        <th>Created</th>
    </tr>

    <!-- Here is where we loop through our $deeds array, printing out deed info -->

    <?php foreach ($deeds as $deed): ?>
    <tr>
        <td><?php echo $deed['Deed']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($deed['Deed']['email'],
array('controller' => 'deeds', 'action' => 'view', $deed['Deed']['id'])); ?>
        </td>
        <td><?php echo $deed['Deed']['first_name']; ?></td>
        <td><?php echo $deed['Deed']['last_name']; ?></td>
        <td><?php echo $deed['Deed']['created']; ?></td>
    </tr>
    <?php endforeach; ?>

</table>