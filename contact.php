<?php
	// Email address verification
	function isEmail($email) {
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}

	if($_POST) {

		// Enter the email where you want to receive the message
		$emailTo = 'douglas.fernando@hidetaka.com.br';

		$name = addslashes(trim($_POST['name']));
		$clientEmail = addslashes(trim($_POST['email']));
		$subject = addslashes(trim($_POST['subject']));
		$message = addslashes(trim($_POST['message']));

		$array = array('nameMessage' => '', 'emailMessage' => '', 'subjectMessage' => '', 'messageMessage' => '');

		if($name == '') {
			$array['nameMessage'] = 'Nome em branco!';
		}
		if(!isEmail($clientEmail)) {
			$array['emailMessage'] = 'E-mail inválido!';
		}
		if($subject == '') {
			$array['subjectMessage'] = 'Assunto em branco!';
		}
		if($message == '') {
			$array['messageMessage'] = 'Mensagem em branco!';
		}
		if($name != '' && isEmail($clientEmail) && $subject != '' && $message != '') {
			// Send email
			$headers = "From: " . $clientEmail . " <" . $clientEmail . ">" . "\r\n" . "Reply-To: " . $clientEmail;
			mail($emailTo, $subject . " (maren)", $message, $headers);
		}

		echo json_encode($array);
	}
?>