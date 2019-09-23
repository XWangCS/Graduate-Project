<?php
	// +----------------------------------------------------------------------
    // | send email
    // +----------------------------------------------------------------------
		
	require_once('../../../config/config.php');
     

	$email = $_POST['email'];

    $title = "change your password";

    $remark = "change your password,and click this url:"."<a href='http://localhost/tudou/app/home/changePassword.php?email=".$email."'>tudou.com</a>";

    if (!is_email($email)) {
        echo "<script>alert('please enter your email;');history.back();</script>";
        exit();
    }

    header('Content-Type:text/html;Charset=utf-8');  
    require '../../../public/phpmailer/PHPMailerAutoload.php';  
    $mail = new PHPMailer;  
    $mail->isSMTP();                                      
    $mail->Host = 'smtp.qq.com';                        
    $mail->SMTPAuth = true;                               
    $mail->CharSet = "UTF-8";                              
    $mail->setLanguage('zh_cn');                         
    $mail->Username = '839308502@qq.com';              
    $mail->Password = 'oyeckxqjkfpvbcji';                       
    $mail->SMTPSecure = 'tls';                              
    $mail->Priority = 3; 
    $mail->Port = 587;                                
    $mail->From = '839308502@qq.com';                 
    $mail->FromName = 'tudou';                            
    $mail->addAddress(htmlspecialchars($email));     
    $mail->WordWrap = 50;                                         
    $mail->isHTML(true);                                           
    $mail->Subject = htmlspecialchars($title);
    $mail->Body    = $remark;        

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        exit;
    }
    echo 'send success';

   