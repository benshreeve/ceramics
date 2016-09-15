<?php
$error = false;
$name = isset($_POST['name']) ? $_POST['name'] : 'name';
$email = isset($_POST['email']) ? $_POST['email'] : 'email';
$message = isset($_POST['message']) ? $_POST['message'] : 'message';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

if ($name == '') {
?><script type="text/javascript">
window.addEventListener("load", function() {
document.getElementById("nameBlank").style.display = "inline-block";
});
</script><?php
$error = true;
}
if ($message == '') {
?><script type="text/javascript">
window.addEventListener("load", function() {
document.getElementById("messageBlank").style.display = "inline-block";
});
</script><?php
$error = true;
}

if ($email == '') {
?><script type="text/javascript">
window.addEventListener("load", function() {
document.getElementById("emailBlank").style.display = "inline-block";
});
</script><?php
$error = true;
}
else {
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
?><script type="text/javascript">
window.addEventListener("load", function() {
document.getElementById("emailInvalid").style.display = "inline-block";
});
</script><?php
$error = true;
}
}

if (!$error) {
$to = 'ben.shreeve@gmail.com';
$subject = 'benshreeve.com Contact';
$body = $name . ", " . $email . ", " . $message;

if (mail ($to, $subject, $body)) {
?><script type="text/javascript">
window.addEventListener("load", function() {
document.getElementById("returnMessage").textContent="Thanks, your request was sent successfully! You can expect a response within the next few business days.";
});
</script><?php
}
else {
?><script type="text/javascript">
window.addEventListener("load", function() {
document.getElementById("returnMessage").textContent="Sorry, something went wrong. Please try again!";
});
</script><?php
}
}
}
?>