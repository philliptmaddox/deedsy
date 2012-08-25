<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link href='http://fonts.googleapis.com/css?family=Snippet' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300italic,300' rel='stylesheet' type='text/css'>
	<?php echo $this->Html->charset(); ?>
	<title>
		Deedsy:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic')
		echo $this->Html->css('bootstrap.min');

		echo $this->Html->script('libs/jquery-1.7.2.min.js');
		echo $this->Html->script('libs/jquery.colorbox-min.js');
		echo $this->Html->script('jquery-ui-1.8.19.custom.min.js');	
		echo $this->Html->script('cakebootstrap.js');
		echo $this->Html->script('bootstrap-datepicker.js');

		echo $this->Html->script('deedsy.core.js');

		echo $this->Html->css('deedsy.layout');
		echo $this->Html->css('deedsy.type');
		echo $this->Html->css('deedsy.colorbox');
		echo $this->Html->css('flick/jquery-ui-1.8.19.custom.css');
		echo $this->Html->css('datepicker.css');
		
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="page-wrapper">
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container">
                	<?php if(!isset($user)){ ?>
                	<a class="brand" href="/">
					<img src="/img/logo_animated.gif">
					</a>
				<div class="nav-collapse">
					<ul class="nav">
						<li class="active"><a href="/what">What is a do good engine?</a></li>
						<li><a href="/faq">FAQs</a></li>
						<li><a href="/about">About</a></li>
						<li><a href="/contact">Contact</a></li>
					</ul>
					<div class="span3 login">
						<span style="font: 700 14px "Open Sans Condensed", Helvetica, sans-serif;"><img src="/img/downarrow.png"/>&nbsp;&nbsp;Existing Do Gooders</span>
						<br />
						<a href="/users/login" alt="log in"><img src="/img/login_button.png" alt="login button"/></a>
					</div>
                    <?php } else { ?>
                    <a class="brand" href="/pages/home">
					<img src="/img/logo_animated.gif">
					</a>
				<div class="nav-collapse">
                    	<div class="nav-links"><a href="/dashboard">Dashboard</a> | <a href="/users/edit">Profile</a><span style="float: right;"><a href="/users/logout">Logout</a></span></div>
                    	<span id="welcome">
	                    	<?php $input = array("Hello, ", "Sup, ", "What up,", "Yo,", "Howdy,");
	                    		$rand_keys = array_rand($input, 2);
	                    		echo $input[$rand_keys[0]] . "\n"; ?>
	                    		<?=$user['User']['first_name']?>!
                    	</span>
                    	<span class="h-label">Your Do Gooder Level: <span class="label-number">1</span></span>
                    	<span class="h-label">Deedsy Points: <span class="label-number"><?=$user['User']['balance']?></span></span>
                    <?php } ?>
				</div>
			</div>
		</div>
	</div>
    <div id="page-body">
		<div class="container content">
			
			<!--<div id="content">-->
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>
			<!--</div>
			-->
		</div>
    </div>
    <div id="page-footer">
    	<div class="footer row">
			<hr />
			<div class="social span3">
				<a href="http://www.facebook.com/gooddeedsy" target="_blank" alt="Deedsy on Facebook"><div class="fb"></div></a>
				<a href="https://de.twitter.com/#!/JoinDeedsy" target="_blank" alt="Deedsy on Twitter"><div class="twitter"></div></a>
				<p>Follow Us On<br />Twitter &amp; Facebook</p>
			</div>
			<div id="foottext" class="span4">
				<p>&copy; All Rights Reserved Deedsy</p>
			</div>
		</div> <!-- END ROW -->
    </div>
    </div>
	<!-- <?php echo $this->element('sql_dump'); ?> -->
</body>
</html>
