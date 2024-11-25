<?php
 
  $receiving_email_address = 'lisaqchimunhu@gmail.com';  // Change this to your email

  if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
  } else {
    die('Unable to load the "PHP Email Form" Library!');
  }

  // Create a new PHP_Email_Form object
  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  // Set the email properties
  $contact->to = $receiving_email_address;  // The email address to receive the form submissions
  $contact->from_name = $_POST['name'];     // Sender's name
  $contact->from_email = $_POST['email'];   // Sender's email
  $contact->subject = $_POST['subject'];    // Email subject

  // Uncomment below code if you want to use SMTP to send emails. 
  // You need to enter your correct SMTP credentials.
  /*
  $contact->smtp = array(
    'host' => 'smtp.example.com',
    'username' => 'your-smtp-username',
    'password' => 'your-smtp-password',
    'port' => '587'
  );
  */

  // Add the form fields to the email
  $contact->add_message($_POST['name'], 'From');       // Name field
  $contact->add_message($_POST['email'], 'Email');     // Email field
  $contact->add_message($_POST['message'], 'Message'); // Message field

  // Send the email and output the result
  echo $contact->send();
?>
