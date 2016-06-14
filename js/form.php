<?php
    session_start();

    if ($_POST["submit"]) {
		
	if(!$_POST["name"]) {	
	    $error.="<br />Please enter your name";	
	} 

	if(!$_POST["email"]) {
	    $error.="<br />Please enter your email";
	} 
		
	if(!$_POST["comment"]) {
	    $error.="<br />Please enter your comment";
	} 
		
	if($_POST['email'] AND !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	    $error.="<br />Please enter a valid email";
	}
		
	if($error) {
	    $result ='<div class="alert alert-danger"><strong>There were error(s) in your form:</strong> '.$error.'</div>';
	} else {
	    if(mail("contact@jackearsman.com", "Comment from Website", "Name: ".$_POST['name']." 
				
			Email: ".$_POST['email']."
				
			Comment: ".$_POST['comment'])) {	
		$result ='<div class="alert alert-success"><strong>Thank you! We\'ll be in touch</strong></div>';		
	    } else {
		$result ='<div class="alert alert-danger"><strong>Sorry, there was an error. Please try again.</strong></div>';			
	    }
        }
    }

?>