<!-- File: /app/View/Users/index.ctp -->

<h1>Users</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Email</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Created</th>
    </tr>

    <!-- Here is where we loop through our $users array, printing out user info -->

    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['User']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($user['User']['email'],
array('controller' => 'users', 'action' => 'view', $user['User']['id'])); ?>
        </td>
        <td><?php echo $user['User']['first_name']; ?></td>
        <td><?php echo $user['User']['last_name']; ?></td>
        <td><?php echo $user['User']['created']; ?></td>
    </tr>
    <?php endforeach; ?>

</table>