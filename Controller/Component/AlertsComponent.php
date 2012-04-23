<?php
# /app/Controller/Component/AlertsComponent.php

class AlertsComponent extends Component {
	
    public function sendNewDeedEmail($owner, $to, $name, $description, $value, $due) {
        App::uses('CakeEmail', 'Network/Email');

		$email = new CakeEmail();
		$email->from(array('no-reply@codeandcountry.com' => 'Deedsy Alert'))
			->to($to)
			->template('default', 'new-alert')
    		->emailFormat('html')
			->viewVars(array('owner' => $owner))
			->subject("New Good Deed Opportunity - $name")
			->send("A friend in need is a friend indeed and ".$user['User']['first_name']." could do with a favor")
			->sender($user['User']['email'], $user['User']['first_name']." ".$user['User']['last_name']);
    }

    public function sendDeedCompleteEmail($deed_name, $to, $from_email, $from_fname, $from_lname) {
        App::uses('CakeEmail', 'Network/Email');

		$email = new CakeEmail();
		$email->from(array('no-reply@codeandcountry.com' => 'Deedsy Alert'))
			->to($to)
			->subject("Good Deed Well Done - $deed_name")
			->send("I did it! I did it!")
			->sender("$from_email", "$from_fname $from_lname");
    }

    public function sendDeedConfirmationEmail($deed_name, $to, $from_email, $from_fname, $from_lname) {
        App::uses('CakeEmail', 'Network/Email');
		
		$email = new CakeEmail();
		$email->from(array('no-reply@codeandcountry.com' => 'Deedsy Alert'))
			->to($to)
			->subject("Good Deed Well Done - $name")
			->send("Deed. Done. Deal. Done.")
			->sender("$from_email", "$from_fname $from_lname");
    }
	
	public function sendWelcomeEmail($to, $to_fname) {
        App::uses('CakeEmail', 'Network/Email');
		
		$email = new CakeEmail();
		$email->from(array('no-reply@codeandcountry.com' => 'Deedsy Alert'))
			->to($to)
			->subject("Welcome to Deedsy $to_fname")
			->send("Thanks for joining our online community of good will.");
    }
	
	public function sendShareEmail($to, $from, $deed) {
        App::uses('CakeEmail', 'Network/Email');
		
		$email = new CakeEmail();
		$email = new CakeEmail();
		$email->from(array('no-reply@codeandcountry.com' => 'Deedsy Alert'))
			->to($to)
			->template('default', 'new-alert')
    		->emailFormat('html')
			->viewVars(array('owner' => $from))
			->subject("New Good Deed Opportunity")
			->send("A friend in need is a friend indeed and ".$from." could do with a favor");
    }
	
	public function sendDoubleOptIn($query) {
        //Maybe V2.0
    }
}

?>