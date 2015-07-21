<?php    
		require_once './haPiHP-master/class.forms.php';
		require_once './haPiHP-master/class.contacts.php';
		
		$HAPIKey = '18996f4a-fb67-4f8a-8f91-6ba88e5a9f56';
		
		
		//ONLY ONE FORM WILL BE CALLED AT ONE TIME
		//FOR DENVER_CO CONTACT FORM
		
		print_r("BEGINNING-------------------");		
		print_r($_POST['denver_co_name']);
		print_r("-------------------");		
		print_r($_POST['denver_co_email']);
		print_r("-------------------");	
		print_r($_POST['denver_co_phone']);		
		
		
		
		if(isset($_POST['denver_co_name']){
			$firstname = $_POST['denver_co_name'];			
		} else{
			$firstname = '';
		}
		
		if(isset($_POST['denver_co_email']){
			$email = $_POST['denver_co_email'];
		} 
		
		if(isset($_POST['denver_co_phone']){
			$phone = $_POST['denver_co_phone'];
		} else{
			$phone = '';
		}		
	

/*	
		//FOR PLAN FORM
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
		
		if( isset($_POST["email"]) ){
			$email = $_POST["email"]; 
		} 
*/			
		
		
		
		print_r("END-------------------");
		$contacts = new HubSpot_Contacts($HAPIKey);
    
	
			//Create Contact
		$params =  array(
						 'firstname' 	=> $firstname, 
						 'zipcode' 		=> $zipcode, 
						 'eco' 			=> $eco,
						 'assembly' 	=> $assembly,
						 'swapping' 	=> $swapping,
						 'cost' 		=> $cost,
						 'days' 		=> $days,
						 'email' 		=> $email,
						 'phone'		=> $phone);
						 
		
		print_r("Params: ");
		print_r($params);
		
		$createdContact = $contacts->create_contact($params);
		print_r("Created contact: ");
		print_r($createdContact);
		$newly_created_vid = $createdContact->{'vid'};
		
		//header("Location: http://tiinyhouse.com/thanks"); /* Redirect browser */
		//exit();
		
	/*		
		//Update Contact
		$params =  array('lastname' => 'Test' );
		$updatedContact = $contacts->update_contact($newly_created_vid,$params);
		print_r($updatedContact);
	*/		
	
		
?>