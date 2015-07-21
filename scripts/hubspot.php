<?php    
		require_once './haPiHP-master/class.forms.php';
		require_once './haPiHP-master/class.contacts.php';
		
		$HAPIKey = '18996f4a-fb67-4f8a-8f91-6ba88e5a9f56';
		
		if( isset($_POST['zipcode']) ){
			$zipcode = $_POST["zipcode"]; 
		
		} else{
			$zipcode = '';
		}
		
		if( isset($_POST['eco']) ){
			$eco = $_POST["eco"]; 
		
		} else{
			$eco = '';
		}
		
		if( isset($_POST['assembly']) ){
			$assembly = $_POST["assembly"]; 
			
		} else{
			$assembly = '';
		}
		
		if( isset($_POST['swapping']) ){
			$swapping = $_POST["swapping"]; 
			
		} else{
			$swapping = '';
		}
		
		if( isset($_POST['cost']) ){
			$cost = $_POST["cost"]; 
			
		} else{
			$cost = '';
		}
		
		if( isset($_POST['days']) ){
			$days = $_POST["days"]; 
			
		} else{
			$days = '';
		}
						
		$email = $_POST["email"]; 
		
		
		//print_r($email);
		$contacts = new HubSpot_Contacts($HAPIKey);
    
			
			//Create Contact
		$params =  array(
						 'firstname' 	=> '', 
						 'zipcode' 		=> $zipcode, 
						 'eco' 			=> $eco,
						 'assembly' 	=> $assembly,
						 'swapping' 	=> $swapping,
						 'cost' 		=> $cost,
						 'days' 		=> $days,
						 'email' 		=> $email);
		$createdContact = $contacts->create_contact($params);
		//print_r($createdContact);
		$newly_created_vid = $createdContact->{'vid'};
		
		header("Location: http://tiinyhouse.com/thanks"); /* Redirect browser */
		exit();
		
	/*		
		//Update Contact
		$params =  array('lastname' => 'Test' );
		$updatedContact = $contacts->update_contact($newly_created_vid,$params);
		print_r($updatedContact);
	*/		
	
		
?>