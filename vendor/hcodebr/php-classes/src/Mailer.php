<?php

namespace Hcode;

use \Rain\Tpl;

class Mailer {

    CONST USERNAME = 'lasgaldino@gmail.com'; //email de quem ta enviando
    CONST PASSWORD  = 'nssupnuufmmvdppd'; //senha gerada
    CONST NAME_FROM = 'HCode'; //remetente
    
    private $mail;

    public function __construct($toAddress, $toName, $subject, $tplName, $data = array())
    {

        $config = array(
            "tpl_dir"       => $_SERVER["DOCUMENT_ROOT"] . "/views/email/",
            "cache_dir"     => $_SERVER["DOCUMENT_ROOT"] . "/views-cache/",
            "debug"         => false // set to false to improve the speed
        );

        Tpl::configure($config);

        $tpl = new Tpl;

        foreach ($data as $key => $value) {
            $tpl->assign($key, $value);
        }

        $html = $tpl->draw($tplName, true);

        $this->mail = new \PHPMailer;
        //Tell PHPMailer to use SMTP
        $this->mail->isSMTP();
        //Enable SMTP debugging
        // SMTP::DEBUG_OFF = off (for production use)
        // SMTP::DEBUG_CLIENT = client messages
        // SMTP::DEBUG_SERVER = client and server messages
        $this->mail->SMTPDebug = 1;
        //Set the hostname of the mail server
        $this->mail->Host = 'smtp.gmail.com';
        //Set the SMTP port number - likely to be 25, 465 or 587
        $this->mail->Port = 587;
        //Whether to use SMTP authentication
        $this->mail->SMTPAuth = true;
        //Username to use for SMTP authentication
        $this->mail->Username = Mailer::USERNAME;
        //Password to use for SMTP authentication
        $this->mail->Password = Mailer::PASSWORD;
        //Set who the message is to be sent from 
        $this->mail->setFrom(Mailer::USERNAME, Mailer::NAME_FROM);
        //Set an alternative reply-to address
        $this->mail->addReplyTo($toAddress, $toName);

        $this->mail->addAddress('lasgaldino@hotmail.com', 'John Doe'); // pra quem vai enviar
        //Set the subject line
        $this->mail->Subject = $subject;
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        $this->mail->msgHTML($html);
        //Replace the plain text body with one created manually
        $this->mail->AltBody = 'This is a plain-text message body';
        //Attach an image file
        // $this->mail->addAttachment('images/phpmailer_mini.png');

    }

        public function send()
        {
            return $this->mail->send();
        }

}
?>