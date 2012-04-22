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
		<table class="table table-striped">
			<thead>
			    <tr>
			        <th>Date Posted</th>
			        <th>Deed Title</th>
			        <th>Deed Creator</th>
			        <th>Points Given</th>
			    </tr>
			</thead>
			<tbody>
			    <?php foreach ($unclaimedDeeds as $deed): ?>
				    <tr>
				        <td><?php echo $deed['Deed']['created']; ?></td>
				        <td><?php echo $this->Html->link($deed['Deed']['name'], array('controller' => 'deeds', 'action' => 'view', $deed['Deed']['id'])); ?></td>
				         <td><?php echo $deed['DeedCreator']['first_name'] .' '.$deed['DeedCreator']['last_name']; ?></td>
				         <td><?php echo $deed['Deed']['value']; ?></td>
				  </tr>
			    <?php endforeach; ?>
			</tbody>
		</table>
	</div>	
	<div id="accepted">
		<table class="table table-striped">
			<thead>
			    <tr>
			        <th>Date Posted</th>
			        <th>Deed Title</th>
			        <th>Deed Creator</th>
			        <th>Status</th>
			        <th>Points Earned</th>
			    </tr>
		    </thead>
		    <tbody>
			    <?php foreach ($claimedDeeds as $deed): ?>
				    <tr>
				        <td><?php echo $deed['ClaimedDeed']['created']; ?></td>
				        <td>
				            <?php echo $this->Html->link($deed['ClaimedDeed']['name'], array('controller' => 'deeds', 'action' => 'view', $deed['ClaimedDeed']['id'])); ?>
				        </td>
				        <td><?php echo $deed['DeedCreator']['first_name'] .' '.$deed['DeedCreator']['last_name']; ?></td>
				        <td><?php echo $deed['Status']['name']; ?></td>
				        <td><?php echo $deed['ClaimedDeed']['value']; ?></td>
				  </tr>
			    <?php endforeach; ?>
		    </tbody>
		</table>
	</div>
	<div id="created">	
		<table class="table table-striped">
			<thead>
			    <tr>
			        <th>Date Posted</th>
			        <th>Deed Title</th>
			        <th>Do Gooder</th>
			        <th>Status</th>
			        <th>Points Given</th>
			    </tr>
			</thead>
			<tbody>
			    <?php foreach ($createdDeeds as $deed): ?>
				    <tr>
				        <td><?php echo $deed['CreatedDeed']['created']; ?></td>
				        <td>
				            <?php echo $this->Html->link($deed['CreatedDeed']['name'], array('controller' => 'deeds', 'action' => 'view', $deed['CreatedDeed']['id'])); ?>
				        </td>
				        <td><?php echo $deed['DeedDoer']['first_name'] .' '. $deed['DeedDoer']['last_name']; ?></td>
				        <td>
				        	<?php
				        		if($deed['Status']['name']=='pending') {
				        			echo $this->Form->postLink(
        							$this->Html->image('mark_complete.png'), 
        							array('controller' => 'deeds','action' => 'markcompleted',$deed['CreatedDeed']['id']),
        							array('escape' => false , 'confirm' => 'are you sure?'));
				        		} else {
				        			echo $deed['Status']['name'];
				        		}
				        	?>
		        		</td>
						<td><?php echo $deed['CreatedDeed']['value']; ?></td>
				  </tr>
			    <?php endforeach; ?>
			</tbody>
		</table>
	</div>	
</div> <!-- END #tabs -->
	