<?php
session_start();
include "DB.php";
include "jdf.php";
connect();
if ($_POST['ResCode'] == '0') {
    //--پرداخت در بانک باموفقیت بوده
    include_once('lib/nusoap.php');
    $client = new nusoap_client('https://bpm.shaparak.ir/pgwchannel/services/pgw?wsdl');
    $namespace='http://interfaces.core.sw.bps.com/';

    $terminalId		= "3730566";					// Terminal ID
    $userName		= "joyse55";					// Username
    $userPassword	= "59795532";		// Password
    $orderId 				= $_POST['SaleOrderId'];		// Order ID

    $verifySaleOrderId 		= $_POST['SaleOrderId'];
    $verifySaleReferenceId 	= $_POST['SaleReferenceId'];

    $parameters = array(
        'terminalId' => $terminalId,
        'userName' => $userName,
        'userPassword' => $userPassword,
        'orderId' => $orderId,
        'saleOrderId' => $verifySaleOrderId,
        'saleReferenceId' => $verifySaleReferenceId);
    // Call the SOAP method
    $result = $client->call('bpVerifyRequest', $parameters, $namespace);
    if($result == 0) {
        //-- وریفای به درستی انجام شد٬ درخواست واریز وجه
        // Call the SOAP method
        $result = $client->call('bpSettleRequest', $parameters, $namespace);
        if($result == 0) {
            //-- تمام مراحل پرداخت به درستی انجام شد.
            //-- آماده کردن خروجی
            echo 'The transaction was successful';

            $ref_id=$_SESSION['ref_id'];
            $comand=docommand("UPDATE link_trans SET trans_status=1 WHERE order_timeId='$ref_id'");
            echo '$ref_id: '.$ref_id.'<br>';
            echo $comand;
            $type=$_SESSION['order_type'];
            $callBackUrl=$_SESSION['callBackUrl'];
            $user_id=$_SESSION['payer_id'];
            $customer_id=$_SESSION['customer_id'];

            $email="";
            $customer_email="";

            $select=select("SELECT * FROM link_users WHERE user_id='$user_id'");
            $res=fetch_result($select);
            foreach ($res as $res)
            {
                $email=$res['user_email'];
            }
            echo $email ;

            $select1=select("SELECT * FROM link_customers WHERE customer_id='$customer_id'");
            $res1=fetch_result($select1);
            foreach ($res1 as $res1)
            {
                $customer_email=$res1['customer_email'];
            }
            echo $customer_email;
            if($type=='plan')
            {
                echo 'plan';
                $comand2=docommand("UPDATE link_orderplan SET order_state=1 WHERE order_timeId='$ref_id'");

                echo $comand2;
                if($comand2)
                {
                    $body='جویسل- خرید موفقیت آمیز ';
                    require_once('class.phpmailer.php');
                    require_once('class.smtp.php');
                    require_once('class.pop3.php');

                    $mail = new PHPMailer(true);
                    $mail->IsSMTP();
                    try {
                        $body="طرح شما با موفقیت خریداری شد. از خرید شما متشکریم".'<br>'.'http://joysell.ir';

                        $mail->Host       = "mail.joysell.ir";
                        $mail->SMTPAuth   = true;
                        $mail->Username   = "info@joysell.ir";
                        $mail->Password   = "S3-3pSiranhost";
                        $mail->Body = "salam ";
                        $mail->AddReplyTo('info@joysell.ir', 'info');
                        $mail->AddAddress($email, 'joysell');
                        $mail->SetFrom('info@joysell.ir', 'joysell');
                        $mail->Subject = 'خرید موفقیت آمیز طرح ';
                        $mail->AltBody = 'Contact Us Sample Form From Iranhost';
                        $mail->CharSet = 'UTF-8';
                        $mail->ContentType = 'text/html';
                        $mail->MsgHTML($body);

                        //$mail->AddAttachment('images/phpmailer.gif');
                        $mail->Send();



                    }
                    catch (phpmailerException $e) {
                        echo $e->errorMessage();
                    }
                    catch (Exception $e) {
                        echo $e->getMessage();
                    }
                    ob_start();
                   // header('Location:http://joysell.ir/user/index.php?Page=Admin_Plans&&message=طرح با موفقیت خریداری شد.');    //this line works now
                    ob_end_flush();
                }else{
                    ob_start();
                   // header('Location:http://joysell.ir/user/index.php?Page=Admin_Plans&&message=دوباره تلاش کنید');    //this line works now
                    ob_end_flush();
                }
            }
            elseif($type=='product'){
                $comand2=docommand("UPDATE link_orders SET order_state=1 WHERE order_timeId='$ref_id'");
                if($comand2)
                {
                    $body='خریداری محصول';
                    require_once('class.phpmailer.php');
                    require_once('class.smtp.php');
                    require_once('class.pop3.php');

                    $mail = new PHPMailer(true);
                    $mail->IsSMTP();
                    try {
                        $body="محصول شما با موفقیت به فروش رسید. برای کسب اطلاعات بیشتر به پنل کاربری خود رجوع کنید".'<br>'.'http://joysell.ir';

                        $mail->Host       = "mail.joysell.ir";
                        $mail->SMTPAuth   = true;
                        $mail->Username   = "info@joysell.ir";
                        $mail->Password   = "S3-3pSiranhost";
                        $mail->Body = "salam ";
                        $mail->AddReplyTo('info@joysell.ir', 'info');
                        $mail->AddAddress($email, 'joysell');
                        $mail->SetFrom('info@joysell.ir', 'joysell');
                        $mail->Subject = ' جویسل- فروش محصول';
                        $mail->AltBody = 'Contact Us Sample Form From Iranhost';
                        $mail->CharSet = 'UTF-8';
                        $mail->ContentType = 'text/html';
                        $mail->MsgHTML($body);

                        //$mail->AddAttachment('images/phpmailer.gif');
                        $mail->Send();


                      

                    }
                    catch (phpmailerException $e) {
                        echo $e->errorMessage();
                    }
                    catch (Exception $e) {
                        echo $e->getMessage();
                    }
					
					
					
					
					
					  //send mail to customer
					
					$body='خریداری محصول';
                    require_once('class.phpmailer.php');
                    require_once('class.smtp.php');
                    require_once('class.pop3.php');

                    $mail = new PHPMailer(true);
                    $mail->IsSMTP();
                    try {
                        $  $body="محصول شما با موفقیت خریداری شذ. برای کسب اطلاعات بیشتر به پنل کاربری خود رجوع کنید".'<br>'.'http://joysell.ir';

                        $mail->Host       = "mail.joysell.ir";
                        $mail->SMTPAuth   = true;
                        $mail->Username   = "info@joysell.ir";
                        $mail->Password   = "S3-3pSiranhost";
                        $mail->Body = "salam ";
                        $mail->AddReplyTo('info@joysell.ir', 'info');
                        $mail->AddAddress($customer_email, 'joysell');
                        $mail->SetFrom('info@joysell.ir', 'joysell');
                        $mail->Subject = ' جویسل- فروش محصول';
                        $mail->AltBody = 'Contact Us Sample Form From Iranhost';
                        $mail->CharSet = 'UTF-8';
                        $mail->ContentType = 'text/html';
                        $mail->MsgHTML($body);

                        //$mail->AddAttachment('images/phpmailer.gif');
                        $mail->Send();
					

                      

                    }
                    catch (phpmailerException $e) {
                        echo $e->errorMessage();
                    }
                    catch (Exception $e) {
                        echo $e->getMessage();
                    }
					

                      
					
					
                    ob_start();
                     header('Location:http://joysell.ir/user/products.php?id='.$user_id.'&&&message=محصول خریداری شد.');    //this line works now
                    ob_end_flush();
                }
                else{
                    ob_start();
                    header('Location:http://joysell.ir/user/products.php?id='.$user_id.'?message=دوباره تلاش کنید');    //this line works now
                    ob_end_flush();
                }
            }

        } else {
            //-- در درخواست واریز وجه مشکل به وجود آمد. درخواست بازگشت وجه داده شود.
            $client->call('bpReversalRequest', $parameters, $namespace);
            echo 'Error : '. $result;
        }
    } else {
        //-- وریفای به مشکل خورد٬ نمایش پیغام خطا و بازگشت زدن مبلغ
        $client->call('bpReversalRequest', $parameters, $namespace);
        echo 'Error : '. $result;
    }
} else {
    //-- پرداخت با خطا همراه بوده
    echo 'Error : '. $_POST['ResCode'];
}
?>