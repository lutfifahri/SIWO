<?php
include_once("vendor/autoload.php");

use PHPMailer\PHPMailer\PHPMailer;

class MailSender
{
    private $pengirim = "abangfiq85@gmail.com";
    private $penerima;
    private $password = "vtobmaogvyzfiqnc";
    private $mail;

    public function __construct($penerima, $jenis, $message = null, $subject = null)
    {
        $this->penerima = $penerima;
        $this->mail = new PHPMailer(true);

        // $this->mail->SMTPDebug = 2;
        $this->mail->isSMTP();
        $this->mail->Host       = 'smtp.gmail.com';
        $this->mail->SMTPAuth   = true;
        $this->mail->Username   = $this->pengirim;
        $this->mail->Password   = $this->password;
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $this->mail->Port       = 465;

        $this->mail->setFrom($this->pengirim, 'Jingga Kreatif');
        $this->mail->addAddress($this->penerima);

        if ($jenis == 'PENDAFTARAN') {
            $randomString = self::getRandomString(6);
            $this->mail->isHTML(true);
            $this->mail->Subject = 'Kode Verifikasi Email';
            $this->mail->Body    = 'Your kode verification is <b>' . $randomString . '</b>';
            setcookie('kode', $randomString, time() + (60 * 5));
        } else if ($jenis == 'PENGAJUAN') {
            $this->mail->isHTML(true);
            $this->mail->Subject = 'Pengajuan Wedding';
            $this->mail->Body    = $message;
        } else if ($jenis == 'MEETING') {
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body    = $message;
        }
        $this->mail->send();
    }

    private static function getRandomString($lenght = 6)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $lenght; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
