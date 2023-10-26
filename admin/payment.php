<?php
/* ALiNezamifar.Com */
if(isset($_POST['price'])){

    include_once('lib/nusoap.php');
    $terminalId		= "3730566";					// Terminal ID
    $userName		= "joyse55";					// Username
    $userPassword	= "59795532";					// Password
    $orderId		= time();						// Order ID
    $amount 		= $_POST['price'];						// Price / Rial
    $localDate		= date('Ymd');					// Date
    $localTime		= date('Gis');					// Time
    $additionalData	= '';
    $callBackUrl	= $_POST['callback'];	// Callback URL
    $payerId		= $_POST['user_id'];
    $product_id = $_POST['product_id'];

//-- تبديل اطلاعات به آرايه براي ارسال به بانک
    $parameters = array(
        'terminalId' 		=> $terminalId,
        'userName' 			=> $userName,
        'userPassword' 		=> $userPassword,
        'orderId' 			=> $orderId,
        'amount' 			=> $amount,
        'localDate' 		=> $localDate,
        'localTime' 		=> $localTime,
        'additionalData' 	=> $additionalData,
        'callBackUrl' 		=> $callBackUrl,
        'payerId' 			=> $payerId);

    $client = new nusoap_client('https://bpm.shaparak.ir/pgwchannel/services/pgw?wsdl');
    $namespace='http://interfaces.core.sw.bps.com/';
    $result 	= $client->call('bpPayRequest', $parameters, $namespace);
//-- بررسي وجود خطا
    if ($client->fault)
    {
        //-- نمايش خطا
        echo "There was a problem connecting to Bank";
        exit;
    }
    else
    {
        $err = $client->getError();
        if ($err)
        {
            //-- نمايش خطا
            echo "Error : ". $err;
            exit;
        }
        else
        {
            $res 		= explode (',',$result);
            $ResCode 	= $res[0];
            if ($ResCode == "0")
            {

                $prodcut = explode("_", $product_id);
                if($prodcut[0]=="plan") {
                    $plan_id = $prodcut[1];
                    $order_type = 'plan';
                    $comand1=docommand("INSERT INTO link_orderplan (plan_id,user_id,order_date,order_timeId)VALUES('$plan_id','$payerId','$date','$ref_id')");
                    $comand2=docommand("INSERT INTO link_trans (trans_amount,trans_status,trans_time,trans_date,user_id,product_id,order_timeId,order_type)VALUES('$amount',0,'$localTime','$localDate','$payerId','$plan_id','$ref_id','$order_type')");
                    $_SESSION['callBackUrl']=$callBackUrl;
                    $_SESSION['order_type']='plan';
                    if($comand1 && $comand2) {
                        //-- انتقال به درگاه پرداخت
                        echo '<form name="myform" action="https://bpm.shaparak.ir/pgwchannel/startpay.mellat" method="POST">
					<input type="hidden" id="RefId" name="RefId" value="'. $res[1] .'">
				</form>
				<script type="text/javascript">window.onload = formSubmit; function formSubmit() { document.forms[0].submit(); }</script>';
                        exit;
                    }
                    else{
                        ob_start();
                        header('Location:submit.php?message=عملیات موفق نبود. دوباره تلاش کنید');    //this line works now
                        ob_end_flush();
                    }
                }
                else{
                    $order_type='product';

                    $comand1=docommand("INSERT INTO link_orders ( order_state, order_amount,order_date, order_product, customer_id,user_id,order_timeId) VALUES (0,'$amount', '$date', '$product_id', '11111', '$payerId','$ref_id')");
                    $comand2=docommand("INSERT INTO link_trans (trans_amount,trans_status,trans_time,trans_date,user_id,product_id,order_timeId,order_type)VALUES('$amount',0,'$localTime','$localDate','$payerId','$product_id','$ref_id','$order_type')");
                    $_SESSION['callBackUrl']=$callBackUrl;
                    $_SESSION['order_type']='product';
                    if($comand1 && $comand2) {
                        //-- انتقال به درگاه پرداخت
                        echo 'sssssss';
                    }
                    else{
                        ob_start();
                        header('Location:submit.php?message=عملیات موفق نبود. دوباره تلاش کنید');    //this line works now
                        ob_end_flush();
                    }
                    

                }
                  
            }
            else
            {
                //-- نمايش خطا
                echo "Error : ". $result;
                exit;
            }
        }
    }
}
?>