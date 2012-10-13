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

<div>
	<h2>Please enter your username and password</h2><hr />
</div>
<div class="span7">
	<?php echo $this->Session->flash('auth'); ?>
	<?php echo $this->Form->create('User');?>
	    <fieldset>
		    <?php
		        echo $this->Form->input('email');
		        echo $this->Form->input('password');
		    ?>
	    </fieldset>
	<?php echo $this->Form->end(__('Login'));?>
</div>
<div class="span4">
	<?php echo __('<h3>Not a Member?</h3><a href="add"><img src="/img/joinnow.png" alt="Join Deedsy!"/></a>'); ?>
	<div class="fb-login-button">Login with Facebook</div>
</div>