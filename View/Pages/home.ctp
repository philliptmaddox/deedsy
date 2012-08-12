<div class="row">
	<div id="homecta"class="span7">
		<div class="banner"></div>
		<img src="img/homeexample.jpg" alt="Help me with my Deed please"/>
		<h1><br />Create a “Deed” for anything from a hug to housesitting and find a Do Gooder to do it.</h1>
		<h2>Do Gooders are rewarded with points that can be used to get deeds done or <b>cashed in for real stuff!</b></h2>
	</div>
	<div class="span5">
		<h1>Newest Deeds.</h1>
		<h4>Can You Do Good?</h4>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Date Posted</th>
					<th>Deed Title</th>
					<th>Points Offered</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($deeds as $deed): ?>
					<tr>
						<td><h5><?php echo $deed['Deed']['created']; ?></h5</td>
						<td><h5><?php echo $this->Html->link($deed['Deed']['name'], array('controller' => 'deeds', 'action' => 'view', $deed['Deed']['id'])); ?></h5></td>
						<td><h5><?php echo $deed['Deed']['value']; ?> pts</h5</td>
					</tr>	
				<?php endforeach; ?>
			</tbody>
		</table>
		<img src="img/dogood-ribbon.png" alt="Do Some Good &amp; Pay it Forward"/>
		<a href="/users/add"><img style="margin: 0 50% 0 24%;" src="img/joinnow.png" alt="Join Deedsy!"/></a>
	</div>
</div>