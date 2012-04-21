<?php
# /app/Controller/Component/AlertsComponent.php

class DeedPointComponent extends Component {
	
    public function transferDeedPoints($from_id, $to_id, $number) {
		$success = false;

		//get owner model
		$this->loadModel('User');
		$from = $this->User->findById($owner_id);
		$to = $this->User->findById($to_id);
		
		//check balance
		if($from->Balance > $number){
			// funds available
			$from->read(null, 1);
			$from_balance = $from->Balance;
			$from->set('balance', ($from_balance - $number));
			$from->save();
			
			$to->read(null, 1);
			$to_balance = $to->Balance;
			$to->set('balance', ($to_balance - $number));
			$to->save();
			
			$success = true;
		}else{
			// too poor
			$success = false;
		}
		
		return $success;
    }
}

?>