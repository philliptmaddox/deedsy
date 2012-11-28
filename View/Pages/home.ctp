 <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            appId      : '336387023123874', // App ID
            channelUrl : '//WWW.deedsy.com/channel.html', // Channel File
            status     : true, // check login status
            cookie     : true, // enable cookies to allow the server to access the session
            xfbml      : true  // parse XFBML
          });
          // Additional initialization code here
        };
        // Load the SDK Asynchronously
        (function(d){
           var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
           if (d.getElementById(id)) {return;}
           js = d.createElement('script'); js.id = id; js.async = true;
           js.src = "//connect.facebook.net/en_US/all.js";
           ref.parentNode.insertBefore(js, ref);
         }(document));
      </script>

<div class="row">
	<div id="homecta"class="span7">
		<div class="banner"></div>
		<img src="/img/homeexample.jpg" alt="Help me with my Deed please"/>
		<h1><br />Create a “Deed” for anything from a hug to housesitting and find a Do Gooder to do it.</h1>
		<h2>Do Gooders are rewarded with points that can be used to get deeds done or <b>cashed in for real stuff!</b></h2>
	</div>
	<div class="span5">
		<h1>Newest Deeds.</h1>
		<h4>Can You Do Good?</h4>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Posted</th>
					<th>Deed Title</th>
					<th>Points Offered</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($deeds as $deed): ?>
					<tr>
						<td><h5><?php echo date('m/d/y', strtotime($deed['Deed']['created'])); ?></h5</td>
						<td><h5><?php echo $this->Html->link($deed['Deed']['name'], array('controller' => 'deeds', 'action' => 'view', $deed['Deed']['id'])); ?></h5></td>
						<td><h5><?php echo $deed['Deed']['value']; ?> pts</h5</td>
					</tr>	
				<?php endforeach; ?>
			</tbody>
		</table>
		<img src="/img/dogood-ribbon.png" alt="Do Some Good &amp; Pay it Forward"/>
		<a href="/users/add"><img style="margin: 0 50% 0 24%;" src="/img/joinnow.png" alt="Join Deedsy!"/></a>
		<h2>Top Do Gooders.</h2>
		<table width="100%" class="table-striped table-condensed table-bordered">
			<thead>
				<tr>
					<th>Do Gooder</th>
					<th>Points Earned</th>
				</tr>
			</thead>
			<tbody>
                  <?php foreach ($doGooders as $doGooder): ?>
		    <tr>
		      <td><?php echo $doGooder['User']['first_name'] . ' ' . $doGooder['User']['last_name'] ?></td>
		      <td><b><?php echo $doGooder['User']['earned'] ?></b></td>
		    </tr>
                  <?php endforeach; ?>
		  </tbody>
		</table>
	</div>
</div>
