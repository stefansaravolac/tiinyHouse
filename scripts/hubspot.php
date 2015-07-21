<?php    
		require_once './haPiHP-master/class.forms.php';
		require_once './haPiHP-master/class.contacts.php';
		
		$HAPIKey = '18996f4a-fb67-4f8a-8f91-6ba88e5a9f56';
		
		$email = $_POST["email"]; //GET AN EMAIL FROM FORM
		print_r($email);
		$contacts = new HubSpot_Contacts($HAPIKey);
    
			
			//Create Contact
		$params =  array('email' => $email, 'firstname' => 'John' );
		$createdContact = $contacts->create_contact($params);
		print_r($createdContact);
		$newly_created_vid = $createdContact->{'vid'};
		
	/*		
		//Update Contact
		$params =  array('lastname' => 'Test' );
		$updatedContact = $contacts->update_contact($newly_created_vid,$params);
		print_r($updatedContact);
	*/		
	
		
?>