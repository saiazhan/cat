<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Путь к файлу autoload.php из PHPMailer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $project = $_POST['project'];
    $message = $_POST['message'];

    // Настройки SMTP
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com';  // SMTP сервер
    $mail->SMTPAuth = true;
    $mail->Username = 'your-email@example.com'; // Ваша электронная почта
    $mail->Password = 'your-password'; // Пароль от вашей почты
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Отправитель
    $mail->setFrom($email, $name);

    // Получатель
    $mail->addAddress('your-email@example.com'); // Ваша электронная почта

    // Тема сообщения
    $mail->Subject = 'Новое сообщение от ' . $name;

    // Тело сообщения
    $mail->Body = "Имя: $name\nEmail: $email\nПроект: $project\n\nСообщение:\n$message";

    // Отправляем письмо
    if ($mail->send()) {
        echo 'Спасибо за ваше сообщение!';
    } else {
        echo 'Произошла ошибка при отправке сообщения: ' . $mail->ErrorInfo;
    }
}
?>
