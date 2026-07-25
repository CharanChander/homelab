<?php
require __DIR__ . '/phpmailer/Exception.php';
require __DIR__ . '/phpmailer/PHPMailer.php';
require __DIR__ . '/phpmailer/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php"); exit;
}

$voornaam   = trim($_POST["voornaam"] ?? "");
$achternaam = trim($_POST["achternaam"] ?? "");
$name       = trim("$voornaam $achternaam");
$email      = trim($_POST["email"] ?? "");
$message    = trim($_POST["message"] ?? "");

if ($name === "" || $email === "" || $message === "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: index.php?status=error#contact"); exit;
}

// Cloudflare Turnstile verification
$turnstileSecret   = getenv('TURNSTILE_SECRET');
$turnstileResponse = $_POST['cf-turnstile-response'] ?? '';

if ($turnstileResponse === '') {
    header("Location: index.php?status=error#contact"); exit;
}

$verify = curl_init();
curl_setopt($verify, CURLOPT_URL, "https://challenges.cloudflare.com/turnstile/v0/siteverify");
curl_setopt($verify, CURLOPT_POST, true);
curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query([
    'secret'   => $turnstileSecret,
    'response' => $turnstileResponse,
]));
curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
$verifyResult = json_decode(curl_exec($verify));
curl_close($verify);

if (empty($verifyResult->success)) {
    header("Location: index.php?status=error#contact"); exit;
}

// Send email via SMTP
$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host       = getenv('SMTP_HOST');
    $mail->SMTPAuth   = true;
    $mail->Username   = getenv('SMTP_USER');
    $mail->Password   = getenv('SMTP_PASS');
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = getenv('SMTP_PORT') ?: 465;

    $mail->setFrom(getenv('SMTP_USER'), "CC-IT-Solutions Website");
    $mail->addAddress(getenv('SMTP_USER'));
    $mail->addReplyTo($email, $name);

    $mail->Subject = "Nieuw bericht van $name via cc-it-solutions.be";
    $mail->Body    = "Naam:   $name\nE-mail: $email\n\nBericht:\n$message";

    $mail->send();
    header("Location: index.php?status=success#contact");
} catch (Exception $e) {
    header("Location: index.php?status=error#contact");
}
exit;