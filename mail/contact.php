<?php

if(empty($_POST['name']) || empty($_POST['message']) || empty($_POST['phone']) ||empty($_POST['propertyType']) || 
empty($_POST['unitType']) || empty($_POST['Budget']) || empty($_POST['RoomType']) || empty($_POST['areaSize']) ||  !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

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

$to = "sales@kuberawoods.com,joy@kuberawoods.com"; // Change this email to your //
$subject = "Quote For :  $name";
$body = "You have received a new message from your website contact form.\n\n".
"Here are the details:\n\nName: $name\n\n\nEmail: $email\n\Phone: $phone\n\nRemarks: $message".
"\n\nProperty Type: $propertyType\n\n\nUnit Type: $unitType\n\nBudget: $Budget\n\nRoom Type: $RoomType".
"\n\nAreaSize: $areaSize\n\n\nProject Commencement: $projectCommencement\n\nAdditional Services: $additionalServices\n\nAddress: $Address";
$header = "From: $email";
$header .= "Reply-To: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
