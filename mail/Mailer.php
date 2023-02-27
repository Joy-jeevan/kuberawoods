<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require 'php-mailer/PHPMailerAutoload.php';

function sendEmail($data) {

	//print_r($data); die();

	$mail = new PHPMailer;

	//$mail->SMTPDebug = 3;                               // Enable verbose debug output

	// $mail->isSMTP();                                      // Set mailer to use SMTP
	// $mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
	// $mail->SMTPAuth = true;                               // Enable SMTP authentication
	// $mail->Username = 'user@example.com';                 // SMTP username
	// $mail->Password = 'secret';                           // SMTP password
	// $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	// $mail->Port = 587;                                    // TCP port to connect to

	$mail->setFrom('reservations@mareabeachfrontvillas.com', 'Website Mailer');
	$mail->addAddress('reservations@mareabeachfrontvillas.com');               // Name is optional
	// $mail->addAddress('undefinedtoken@gmail.com');               // Name is optional

	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = 'Enquiry';
	$mail->Body    = '
		<table>
			<tr>
				<td>Name</td>
				<td>'.$data['name'].'</td>
			</tr>
			<tr>
				<td>Email</td>
				<td>'.$data['email'].'</td>
			</tr>
			<tr>
				<td>Phone</td>
				<td>'.$data['contact'].'</td>
			</tr>
			<tr>
				<td>Enquiry</td>
				<td>'.$data['book'].'</td>
			</tr>
			<tr>
				<td>Message</td>
				<td>'.$data['message'].'</td>
			</tr>
		</table>
	';
	//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	//die($mail->Body);

	if(!$mail->send()) {
		return array(
			'status' => 'error',
			'message' => 'Message could not be sent.',
			'error' => 'Mailer Error: ' . $mail->ErrorInfo
		);
	} else {
	    return array(
			'status' => 'success',
			'message' => 'Message has been sent.'
		);
	}

}

function sendJsonResponse($data) {
	header('Content-type: application/json');
	die(json_encode($data));
}

if(isset($_POST) && !empty($_POST)) {

	$response = sendEmail($_POST);
	sendJsonResponse($response);

}