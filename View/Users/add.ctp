<!-- File: /app/View/Users/add.ctp -->
<?php $this->Html->css('deedsy.forms', null, array('inline' => false));?>

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

<div class="row span12">
	<img src="/img/join_dude.jpg" alt="Join Deedsy Dude" style="float:left;"/>
    <div class="span3" style="float:right;">
        <div class="users form" style="float:right">
        <img  style="margin-bottom: 20px;" src="/img/earn_25.jpg" alt="Earn 25 Deedsy Points"/>	
        <?php echo $this->Form->create('User');?>
        <fieldset>
        <?php
        echo $this->Form->input('email', array('label' => 'Email'));
        echo $this->Form->input('first_name', array('label' => 'First Name'));
        echo $this->Form->input('last_name', array('label' => 'Last Name'));
        echo $this->Form->input('password', array('label' => 'Choose Password'));
        echo $this->Form->input('password_confirm', array('label' => 'Confirm Password', 'type' => 'password'));
       	echo $this->Form->submit('/img/joinnow.png');
	    echo $this->Form->end();
        ?>
        </fieldset>
        <div class="fb-login-button users-add-shift">Login with Facebook</div>
        </div>
	</div>
</div>
<div class="row">
	
</div>