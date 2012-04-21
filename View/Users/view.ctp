<!-- File: /app/View/Users/view.ctp -->

<h1><?php echo h($user['User']['email'])?></h1>
<p><small>Name: <?php echo $user['User']['first_name']?> <?php echo $user['User']['last_name']?></small></p>
<p><small>Created: <?php echo $user['User']['created']?></small></p>