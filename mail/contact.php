<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';

error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");

$mail = new PHPMailer;

if(empty($_POST['name']) || empty($_POST['message']) || empty($_POST['phone']) ||empty($_POST['propertyType']) || empty($_POST['unitType']) || empty($_POST['Budget']) || empty($_POST['RoomType']) || empty($_POST['areaSize']) ||  !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}
$mail->setFrom('joy.dmello554@gmail.com', 'Website Mailer');
$mail->addAddress('joy.dmello554@gmail.com');
$mail->isHTML(true); 
$mail->Subject = "Quote For :  $name";

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
$propertyType = strip_tags(htmlspecialchars($_POST['propertyType']));
$unitType = strip_tags(htmlspecialchars($_POST['unitType']));
$Budget = strip_tags(htmlspecialchars($_POST['Budget']));
$RoomType = strip_tags(htmlspecialchars($_POST['RoomType']));
$areaSize = strip_tags(htmlspecialchars($_POST['areaSize']));
$projectCommencement = strip_tags(htmlspecialchars($_POST['projectCommencement']));
$additionalServices = strip_tags(htmlspecialchars($_POST['additionalServices']));
$Address = strip_tags(htmlspecialchars($_POST['Address']));

$mail->Body   = "You have received a new message from your website contact form.\n\n";
$mail->Body .= "Here are the details:\n\nName: $name\nEmail: $email\nPhone: $phone\nRemarks: $message";
$mail->Body .="\nProperty Type: $propertyType\nUnit Type: $unitType\nBudget: $Budget\nRoom Type: $RoomType";
$mail->Body .="\nAreaSize: $areaSize\nProject Commencement: $projectCommencement\nAdditional Services: $additionalServices\nAddress: $Address";

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

// $to = "sales@kuberawoods.com"; // Change this email to your //

// $subject = "Quote For :  $name";
// $body = "You have received a new message from your website contact form.\n\n";
// $body .= "Here are the details:\n\nName: $name\nEmail: $email\nPhone: $phone\nRemarks: $message";
// $body .="\nProperty Type: $propertyType\nUnit Type: $unitType\nBudget: $Budget\nRoom Type: $RoomType";
// $body .="\nAreaSize: $areaSize\nProject Commencement: $projectCommencement\nAdditional Services: $additionalServices\nAddress: $Address";
// $header = "From: $email";
// $header .= "Reply-To: $email";	



// // $subject = "$m_subject:  $name";
// // $body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\n\nEmail: $email\n\nSubject: $m_subject\n\nMessage: $message";
// // $header = "From: sales@kuberawoods.com";

// if(!$mail->send()) {
//   return array(
//     'status' => 'error',
//     'message' => 'Message could not be sent.',
//     'error' => 'Mailer Error: ' . $mail->ErrorInfo
//   );
// } else {
//     return array(
//     'status' => 'success',
//     'message' => 'Message has been sent.'
//   );
// }

// if (mail($to, $subject, $body, $header)) {
//   echo 'Your message has been sent.';
// } else {
//   print_r(error_get_last());
//   echo 'There was a problem sending the email.';
// }
// if(!mail($to, $subject, $body, $header))
//   http_response_code(500);
// echo "Contact form ";
?>