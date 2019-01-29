<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$name = strip_tags(trim($_POST["your_name"]));
	$name = str_replace(array("\r","\n"),array(" "," "), $name);
	$email = filter_var(trim($_POST["your_mail"]), FILTER_SANITIZE_EMAIL);
	$subject = trim($_POST["your_subject"]);
	$message = trim($_POST["your_message"]);

	
	if ( empty($name) OR empty($subject) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
		
		http_response_code(400);
		echo "Please complete the form and try again.";
		exit;
	}

	
	
	$recipient = "qdulery@gmail.com";

	
	$subject = "$subject";

	
	$email_content = "Name: $name\n";
	$email_content .= "Email: $email\n\n";
	$email_content .= "Subject: $subject\n\n";
	$email_content .= "Message:\n$message\n";

	
	$email_headers = "From: $name <$email>";

	// Send the email.
	if (mail($recipient, $subject, $email_content, $email_headers)) {
		
		http_response_code(200);
		echo "Merci! Votre message a été envoyé.";
	} else {
		http_response_code(500);
		echo "Oops! Votre message n'a pas pû être envoyé...";
	}

} else {
	http_response_code(403);
	echo "There was a problem with your submission, please try again.";
}



?>




