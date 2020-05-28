<!-- ?php
if(isset( $_POST['name']))
$name = $_POST['name'];
if(isset( $_POST['email']))
$email = $_POST['email'];
if(isset( $_POST['message']))
$message = $_POST['message'];
if(isset( $_POST['phoneNum']))
$subject = $_POST['phoneNum'];

$content="From: $name \n Number: $phoneNum \n  subject: $subject \n Email: $email \n Message: $message ";
$recipient = "molifechaplain366@gmail.com";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $content, $mailheader) or die("Error!");
echo "Email sent!";
? -->

<?php
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$phoneNum = $_POST['phoneNum'];

header('Content-Type: application/json');
if ($name === ''){
print json_encode(array('message' => 'Name cannot be empty', 'code' => 0));
exit();
}
if ($email === ''){
print json_encode(array('message' => 'Email cannot be empty', 'code' => 0));
exit();
} else {
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
print json_encode(array('message' => 'Email format invalid.', 'code' => 0));
exit();
}
}
if ($subject === ''){
print json_encode(array('message' => 'Subject cannot be empty', 'code' => 0));
exit();
}

if ($phoneNum === ''){
    print json_encode(array('message' => 'Phone Number cannot be empty', 'code' => 0));
    exit();
    }

if ($message === ''){
print json_encode(array('message' => 'Message cannot be empty', 'code' => 0));
exit();
}

$content="From: $name \nEmail: $email \nPhone Number: $phoneNum \nMessage: $message";
$recipient = "molifechaplain366@gmail.com";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $content, $mailheader) or die("Error!");
print json_encode(array('message' => 'Email successfully sent!', 'code' => 1));
exit();
?>