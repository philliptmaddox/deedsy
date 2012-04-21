<?php
# /app/Controller/Component/AlertsComponent.php

class AlertsComponent extends Component {
	
    public function sendNewDeedEmail($owner_id, $to, $name, $description, $value, $due) {
        App::uses('CakeEmail', 'Network/Email');
		
		//get owner model
		$this->loadModel('User');
		$this->User->findById($owner_id);
		if($this->User->exists()){
			$email = new CakeEmail();
			$email->from(array('no-reply@codeandcountry.com' => 'Deedsy Alert'))
				->to($to)
				->subject("New Good Deed Opportunity - $name")
				->send("A friend in need is a friend indeed and $this->User->FirstName could do with a favor")
				->sender("$this->User->Email", "$this->User->FirstName $this->User->LastName");
		}
    }

    public function sendDeedCompleteEmail($customer_id, $recipe_id) {
        App::uses('CakeEmail', 'Network/Email');
		
		//get owner model
		$this->loadModel('User');
		$this->User->findById($owner_id);
		if($this->User->exists()){
			$email = new CakeEmail();
			$email->from(array('no-reply@codeandcountry.com' => 'Deedsy Alert'))
				->to($to)
				->subject("Good Deed Well Done - $name")
				->send("I did it! I did it!")
				->sender("$this->User->Email", "$this->User->FirstName $this->User->LastName");
		}
    }

    public function sendDeedConfirmationEmail($query) {
        App::uses('CakeEmail', 'Network/Email');
		
		//get owner model
		$this->loadModel('User');
		$this->User->findById($owner_id);
		if($this->User->exists()){
			$email = new CakeEmail();
			$email->from(array('no-reply@codeandcountry.com' => 'Deedsy Alert'))
				->to($to)
				->subject("Good Deed Well Done - $name")
				->send("Deed. Done. Deal. Done.")
				->sender("$this->User->Email", "$this->User->FirstName $this->User->LastName");
		}
    }
	
	public function sendWelcomeEmail($owner_id) {
        App::uses('CakeEmail', 'Network/Email');
		
		//get owner model
		$this->loadModel('User');
		$this->User->findById($owner_id);
		if($this->User->exists()){
			$email = new CakeEmail();
			$email->from(array('no-reply@codeandcountry.com' => 'Deedsy Alert'))
				->to($to)
				->subject("Welcome to Deedsy $this->User->FirstName")
				->send("Thanks for joining our online community of good will.");
		}
    }
	
	public function sendDoubleOptIn($query) {
        //Maybe V2.0
    }
}

?>