<?php 
if (isset($_POST['submit'])) {
// Initialize error array.
  $errors = array();
  // Validation of Name, Email, Phone Number and Message
  if (!empty($_POST['name'])) {
  $name = $_POST['name'];
  $pattern = "/^[a-zA-Z ]*$/";// This is a regular expression that checks if the name is valid characters
  if (preg_match($pattern,$name)){ $name = $_POST['name'];}
  else{ $errors[] = 'Your Name can only contain _, 1-9, A-Z or a-z 2-20 long.';}
  } else {$errors[] = 'You forgot to enter your Name.';}  

  if (!empty($_POST['email'])) {
  $email = $_POST['email'];
  $pattern = "/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}/";// RegEx for Email Validation
  if (preg_match($pattern,$email)){ $email = $_POST['email'];}
  else{ $errors[] = 'Invalid Email';}
  } else {$errors[] = 'You forgot to enter your Email.';} 

  if (!empty($_POST['phone'])) {
  $phone = $_POST['phone'];
  $pattern = "/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i";// RegEx for Phone Number Validation
  if (preg_match($pattern,$phone)){ $phone = $_POST['phone'];}
  else{ $errors[] = 'Invalid Phone Number';}
  } else {$errors[] = 'You forgot to enter your phone number.';} 

  if (!empty($_POST['message'])) {
  $message = $_POST['message'];
  $pattern = "/^[A-Za-z0-9.,+]/";// This is a regular expression that checks if the message has valid characters
  if (preg_match($pattern,$message)){ $message = $_POST['message'];}
  else{ $errors[] = 'Your message can only contain _, 1-9, A-Z or a-z.';}
  } else {$errors[] = 'You forgot to enter your message.';}  

   if (empty($errors)) { 
  $from = "Seattle GT Website"; //Site name  
  $to = "ganbotile@yahoo.com"; 
  $subject = "Customer inquiry from " . $name . "";
  $message_contents = "Message from " . $name ."\n\n" . "Phone: " . $phone ."\n\n" . "Email: " . $email ."\n\n" . "Message: " . $message; 
  mail($to,$subject,$message_contents,$from);
  }

  // Print any error messages. 
  if (!empty($errors)) { 
  echo '<hr /><h3>The following occurred:</h3><ul>'; 
  // Print each error. 
  foreach ($errors as $msg) { echo '<li>'. $msg . '</li>';}
  echo '</ul><h3>Your mail could not be sent due to input errors.</h3><hr />';}
   else{echo '<hr /><h3 align="center">Your mail was sent. Thank you!</h3><hr />';}

  } 

 
