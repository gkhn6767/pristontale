﻿<?php 

require_once("smtp/class.phpmailer.php");
include_once("mysql.php");
$mail = new PHPMailer();
$mail->SetLanguage("br", "smtp/"); //Idioma
$mail->IsSMTP();

$mail->SMTPAuth = true;
$mail->Host = "mail.reloadedpt.net"; //Host do servidor SMTP
$mail->Port = "25";
$mail->Username = "no-reply@reloadedpt.net"; //Nome do usuario SMTP
$mail->Password = "Jona240993";     //Senha do usuario SMTP
$mail->From = "no-reply@reloadedpt.net"; //Email de quem envia
$mail->FromName = utf8_decode($ServerName);    //nome de quem ta enviando, vai aparecer na coluna "De:"

//INICIO --- Quem vai receber-----------------------------------------------
$mail->AddAddress($_POST['emailrec']);
//FIM --- Quem vai receber--------------------------------------------------

$mail->AddReplyTo("no-reply@reloadedpt.net"); //Quem irá receber a resposta (quando a pessoal responder)
$mail->IsHTML(true);

//Assunto
$mail->Subject = utf8_decode("Recovery account ".$ServerName."");
//Corpo da mensagem, pode usar tags html
$mail->Body = utf8_decode(
'<style type="text/css">

table
{
	font-family:Arial;
	font-size:14px;
}
a:link {
	color: #630;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #630;
}
a:hover {
	text-decoration: none;
	color: #930;
}
a:active {
	text-decoration: none;
	color: #930;
}

</style>


<table width="615" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="'.$site.'/themes/reloadedpt/img/msg/bgMSG_r1_c1.png" width="615" height="107" /></td>
  </tr>
  <tr>
    <td height="250" align="center" valign="top"><table width="615" border="0" align="center" cellpadding="2" cellspacing="3">
      <tr>
        <td height="39" colspan="3">&nbsp;</td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td><strong>Your email:</strong> '.$_POST['emailrec'].'</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="87">&nbsp;</td>
        <td width="441">
		Hello,
		Are you getting your key for account recovery.
		To continue recovering your data click the button below.
		If not that you asked this email, please disregard.
		</td>
      <tr>
        <td>&nbsp;</td>
        <td>
		<a href="'.$urlrec.'">
		<img src="'.$site.'/themes/reloadedpt/img/msg/autenticar.png" width="157" height="43" border="0" />
		</a>
		</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Sent: '.date("Y/m/d H:m:s").'</td>
        <td>&nbsp;</td>
      </tr>
        <td width="87">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>');

if(!$mail->Send()){  echo $mail->ErrorInfo; 

exit; 

} //FIM E-MAIL

?>