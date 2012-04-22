<!-- File: /app/View/Dashboard/index.ctp -->
<!-- <h1><?php echo($user['User']['email'])?></h1> -->
<h2>What Up,<?php echo $user['User']['first_name']?></h2>
<p>Member Since: <?php echo $user['User']['created']?></p>
<!-- <p>Testing Date:<?php echo date ( "F Y" ,$user['User']['created'] )?></p> -->
<script>
	$(function() {
		$( "#tabs" ).tabs();
	});
</script>
<div id="tabs">
	<ul>
		<li><a href="#everyone"><h3>Everyone's Deeds</h3></a></li>
		<li><a href="#accepted"><h3>Accepted Deeds</h3></a></li>
		<li><a href="#created"><h3>Created Deeds</h3></a></li>
	</ul>
	<div id="everyone">
		<table>
		    <tr>
		        <th>Date Posted</th>
		        <th>Deed Title</th>
		        <th>Tags</th>
		        <th>Deed Creator</th>
		        <th>Points Given</th>
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
	</div>	
	<div id="accepted">
		<table>
		    <tr>
		        <th>Date Posted</th>
		        <th>Deed Title</th>
		        <th>Tags</th>
		        <th>Deed Creator</th>
		        <th>Status</th>
		        <th>Points Earned</th>
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
	</div>
	<div id="created">	
		<table>
		    <tr>
		        <th>Date Posted</th>
		        <th>Deed Title</th>
		        <th>Tags</th>
		        <th>Do Gooder</th>
		        <th>Status</th>
		        <th>Points Given</th>
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
	</div>	
</div> <!-- END #tabs -->
	