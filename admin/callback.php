<?php
session_start();
$ref_id=$_SESSION['ref_id'];
include 'BD.php';
if ($_POST['ResCode'] == '0') {
    //--پرداخت در بانک باموفقیت بوده
    include_once('lib/nusoap.php');

    $client = new nusoap_client('https://bpm.shaparak.ir/pgwchannel/services/pgw?wsdl');
    $namespace='http://interfaces.core.sw.bps.com/';

    $terminalId		= "3730566";					// Terminal ID
    $userName		= "joyse55";					// Username
    $userPassword	= "59795532";					// Password
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

            $comand=docommand("UPDATE link_trans SET trans_status=1 WHERE order_timeId='$ref_id'");
            $type=$_SESSION['order_type'];
            $callBackUrl=$_SESSION['callBackUrl'];
            if($type=='plan')
            {
                $comand2=docommand("UPDATE link_orderPlan SET order_state=1 WHERE order_timeId='$ref_id'");
            }elseif($type=='product'){
                $comand2=docommand("UPDATE link_orders SET order_state=1 WHERE order_timeId='$ref_id'");
            }


            $body='کاربر گرامی، جهت فعال سازی حساب کاربری خود'.'<br><br>'.'http://joysell.ir/operation.php?key='.$rnd.'&&d='.$user_id.'&&type=active';
            require_once('class.phpmailer.php');
            require_once('class.smtp.php');
            require_once('class.pop3.php');

            $mail = new PHPMailer(true);
            $mail->IsSMTP();
            try {
                $body="جهت فعال سازی حساب کاربری خود وارد لینک زیر شوید."."<br><br>"."http://joysell.ir/operation.php?key=".$rnd."&&d=".$user_id."&&type=active";

                $mail->Host       = "mail.joysell.ir";
                $mail->SMTPAuth   = true;
                $mail->Username   = "info@joysell.ir";
                $mail->Password   = "S3-3pSiranhost";
                $mail->Body = "salam ";
                $mail->AddReplyTo('info@joysell.ir', 'info');
                $mail->AddAddress('it.davoodi@gmail.com', 'joysell');
                $mail->SetFrom('info@joysell.ir', 'joysell');
                $mail->Subject = 'فاکتور فروش';
                $mail->AltBody = 'Contact Us Sample Form From Iranhost';
                $mail->CharSet = 'UTF-8';
                $mail->ContentType = 'text/html';
                $mail->MsgHTML($body);

                //$mail->AddAttachment('images/phpmailer.gif');
                $mail->Send();

                ob_start();
                //   header('Location:'.$callBackUrl.'&&message=اطلاعات شما با موفقیت ثبت شد');    //this line works now
                ob_end_flush();


            }
            catch (phpmailerException $e) {
                echo $e->errorMessage();
            }
            catch (Exception $e) {
                echo $e->getMessage();
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