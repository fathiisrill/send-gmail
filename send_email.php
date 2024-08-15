<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Path ke autoload.php dari Composer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];

    $mail = new PHPMailer(true);

    try {
        // Pengaturan Server
        $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Aktifkan debug (opsional)
        $mail->isSMTP();
        $mail->Host       = 'xitkjboy.gmail.com'; // Ganti dengan SMTP server Anda
        $mail->SMTPAuth   = true;
        $mail->Username   = 'xitkjboy@gmail.com'; // Ganti dengan email Gmail Anda
        $mail->Password   = 'xIAstKjDtdAlbC#2'; // Ganti dengan password Gmail Anda
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
        $mail->Port       = 465; 

        // Pengaturan Email
        $mail->setFrom('xitkjboy@gmail.com', 'XI TKJ'); // Ganti dengan email dan nama Anda
        $mail->addAddress('xitkjboy@gmail.com'); // Ganti dengan email tujuan

        $mail->isHTML(true); 
        $mail->Subject = 'ADA YANG KIRIM GMAIL NIH';
        $mail->Body    = "Nama: $nama<br>Email: $email<br>Pesan: $pesan";

        $mail->send();
        echo 'Pesan berhasil terkirim!';
    } catch (Exception $e) {
        echo "Pesan gagal terkirim. Error: {$mail->ErrorInfo}";
    }
}
?>