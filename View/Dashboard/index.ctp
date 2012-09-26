<!-- File: /app/View/Dashboard/index.ctp -->
<!-- <h1><?php echo($user['User']['email'])?></h1> -->
<!-- <p>Testing Date:<?php echo date ( "F Y" ,$user['User']['created'] )?></p> -->
<script>
	$(function() {
		$( "#tabs" ).tabs();
	});
</script>
<div class="well">
	<?php echo $this->Html->link("+ Create Deed", array('controller' => 'deeds', 'action' => 'add'), array("class" => "btn btn-large btn-primary")) ?>
	<div id="bonus">
	<?php if (count($createdDeeds) == 0):?>
		<h1>Create Your First Deed &amp; get +5 bonus Deedsy Points!</h1>
	</div>
	<img style="float: right; margin-top: -50px;" src="img/cat_plus_5.png"></img>		
	<?php else:?>
		<h2>
	    	<?php $input = array("Need a favor? Create a Deed and find help.", "We're not telling you what kind of deeds need doing. Just create some.", "If you need it, Deedsy's got it. Create a Deed!", "Did You Know: The most borrowed item is a book.");
	    		$rand_keys = array_rand($input);
	    		echo $input[$rand_keys] . "\n"; ?>
        </h2>
        </div>
	<?php endif;?>
</div>
<script>
	$(function(){
		$('.deedtab').click(function(){
			var id=$(this).attr("id");
			var h2text;
			var h4text;
			if (id=="everyonetab"){
				h2text="Most Recent Deeds in Need of a Do Gooder.";
				h4text="Can You Do Good?";
			}else if(id=="acceptedtab"){
				h2text="Deeds You’ve Agreed to Do.";
				h4text="Look how nice you are! A saint maybe?";
				
			}else if(id=="createdtab"){
				h2text="Deeds You’ve Created.";
				h4text="That’s a lot of love being thrown your way!";
			}
			$('#everyoneh2').text(h2text);
			$('#everyoneh4').text(h4text);
		});
	});
</script>
<h2 id="everyoneh2">Most Recent Deeds in Need of a Do Gooder.</h2>
<h4 id="everyoneh4">Can You Do Good?</h4>
<div class="row">
	<div class="span9" id="tabs">
		<ul>
			<li><a id="everyonetab" class="deedtab" href="#everyone"><h3>Everyone's Deeds</h3></a></li>
			<li><a id="acceptedtab" class="deedtab" href="#accepted"><h3>Accepted Deeds</h3></a></li>
			<li><a id="createdtab" class="deedtab" href="#created"><h3>Created Deeds</h3></a></li>
		</ul>
		<div id="everyone">
			<table class="table table-striped">
				<thead>
				    <tr>
				        <th>Date Posted</th>
				        <th>Deed Title</th>
				        <th>Creator</th>
				        <th>Points</th>
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
	<div class="span2">
		<h2>Top Do Gooders.</h2>
		<table width="100%" class="table-striped table-condensed table-bordered">
		  <tbody>
		    <tr>
		      <td>Ben Stucki</td>
		      <td><b>45</b></td>
		    </tr>
		    <tr>
		      <td>Ben Stucki</td>
		      <td><b>45</b></td>
		    </tr>
		    <tr>
		      <td>Ben Stucki</td>
		      <td><b>45</b></td>
		    </tr>
		    <tr>
		      <td>Ben Stucki</td>
		      <td><b>45</b></td>
		    </tr>
		    <tr>
		      <td>Ben Stucki</td>
		      <td><b>45</b></td>
		    </tr>
		  </tbody>
		</table>
	</div>
</div> <!-- END .row -->	
<div class="row">
	<div class="span12">
		<h2>Popular Tags</h2>
			<div class="tags">
				<?php for ($i=0;$i < count($tags);$i++): ?> 
					<?php if ($i < count ($tags) - 1): ?>
						<strong><?php echo $tags [$i] ['Tag']['name']; ?>,</strong>
					<?php  else: ?>
						<strong><?php echo $tags [$i] ['Tag']['name']; ?></strong>
					<?php  endif; ?>		
				<?php endfor; ?>
			</div>
	</div>
</div>
	