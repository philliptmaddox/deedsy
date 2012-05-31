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
 * @package       Cake.View.Emails.html
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<table width="550" border="0" cellpadding="0" cellspacing="0">
			<thead width="550">
				<th width="550"><img src="http://deedsy.codeandcountry.com/app/webroot/img/email_header.jpg" alt="email header" width="550" height="162"</th>
			</thead>
			<tbody>
<?php
$content = explode("\n", $content);

foreach ($content as $line):
	echo '<p> ' . $line . "</p>\n";
endforeach;
?>
					<tr width="500">
						<td border="0"><img src="http://deedsy.codeandcountry.com/app/webroot/img/1.jpg" alt="0"/></td>
						<td border="0"><img src="http://deedsy.codeandcountry.com/app/webroot/img/2.jpg" alt="0"/></td>
						<td border="0"><img src="http://deedsy.codeandcountry.com/app/webroot/img/3.jpg" alt="0"/></td>
						<td border="0"><img src="http://deedsy.codeandcountry.com/app/webroot/img/4.jpg" alt="0"/></td>
						<td border="0"><img src="http://deedsy.codeandcountry.com/app/webroot/img/5.jpg" alt="0"/></td>
					</tr>	
			</tbody>
		</table>
	</body>
</html>