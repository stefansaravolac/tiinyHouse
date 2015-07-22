<?php    
		//NOTE - if you uncomment print_r, redirect via header will not work!
		//So it's either debug with print messages, or redirect
		
		require_once './haPiHP-master/class.forms.php';
		require_once './haPiHP-master/class.contacts.php';
		
		$HAPIKey = '18996f4a-fb67-4f8a-8f91-6ba88e5a9f56';
		
		
		
		
		//ONLY ONE FORM WILL BE CALLED AT ONE TIME
		//FOR DENVER_CO CONTACT FORM
		if(isset($_POST['denver_co_name'])){
			$firstname = $_POST['denver_co_name'];			
		} else{
			$firstname = '';
		}
		
		if(isset($_POST['denver_co_email'])){
			$email = $_POST['denver_co_email'];
		} 
		
		if(isset($_POST['denver_co_phone'])){
			$phone = $_POST['denver_co_phone'];
            $city  = 'Denver';
            $state  = 'Colorado';
		} else{
			$phone = '';
            $city = '';
            $state  = '';
		}		
	

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
		
		
		if( isset($_POST["plan_city"]) ){
			$city = $_POST["plan_city"];
           
		}
		
		if( isset($_POST["plan_state"]) ){
			$state  = $_POST["plan_state"];
		}

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
						 'phone'		=> $phone,
                         'city'         => $city,
                         'state'        => $state);
						 
		
		//print_r("Params: ");
		//print_r($params);
		
		$createdContact = $contacts->create_contact($params);
		//print_r("Created contact: ");
		//print_r($createdContact);
		
		
		//check if property in response object exists
		$isSuccessPropertyThere = property_exists($createdContact, "vid");
		//print_r(" ");
		//print_r($isSuccessPropertyThere);

        if(($createdContact->status == 'error') && ($createdContact->message == 'Contact already exists')){
            header("Location: http://tiinyhouse.com/existing");
            exit();

        } elseif ($isSuccessPropertyThere === true){
			header("Location: http://tiinyhouse.com/thanks");
			exit();
			
		} else{
			header("Location: http://tiinyhouse.com/error");
			exit();
		}

		
	/*		
		$newly_created_vid = $createdContact->{'vid'}; //NECESSARY IF YOU WANT TO USE UPDATE CONTACT
		//Update Contact
		
		$params =  array('lastname' => 'Test' );
		$updatedContact = $contacts->update_contact($newly_created_vid,$params);
		print_r($updatedContact);
	*/		
	
		
?>