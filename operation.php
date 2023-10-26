<?php
session_start();
include "DB.php";
include "jdf.php";


connect();
$type= $_REQUEST["type"];
echo"$type";
echo"<br/>";
//insert into
if($type=="order_store" )
{
    $user_signUpDate=jdate("Y-n-j");
    $user_fname=$_POST['fname'];
    $user_lname=$_POST['lname'];
    $user_pass=$_POST['password'];
    $hash_pass=md5($user_pass);
    $re_password=$_POST['repassword'];
    $user_email=$_POST['email'];
    $user_mobile=$_POST['mobile'];

    $select= select("select max(user_id) as max_id from link_users");
    $rec=fetch_result($select);
    $user_id=0;
    foreach ($rec as $rec)
    {
    $user_id=$rec['max_id']+1;
    echo $user_id;
    }
    echo $user_email;

    $result1=select("select * from link_users WHERE user_email='$user_email'");
    $count = $result1->rowCount();
    echo 'count:'.$count;
     if($count==0) {

         if ($user_pass == $re_password) {

             $rnd_number = rand();
             $rnd = md5($rnd_number);
             echo $rnd;

             if((docommand("INSERT INTO  link_users (user_id,user_fname,user_lname,user_pass,user_email,user_mobile,user_signUpDate,user_recovery)VALUES ('$user_id','$user_fname','$user_fname','$hash_pass','$user_email','$user_mobile','$user_signUpDate','$rnd')")))
             {
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
                     $mail->AddAddress($user_email, 'joysell');
                     $mail->SetFrom('info@joysell.ir', 'joysell');
                     $mail->Subject = 'فعال سازی حساب کاربری-جوی سل ';
                     $mail->AltBody = 'Contact Us Sample Form From Iranhost';
                     $mail->CharSet = 'UTF-8';
                     $mail->ContentType = 'text/html';
                     $mail->MsgHTML($body);

                     //$mail->AddAttachment('images/phpmailer.gif');
                     $mail->Send();

                     ob_start();
                     header('Location:index.php?type=modal&&message=لینک فعال سازی حساب کاربری به ایمیل شما ارسال شد.');    //this line works now
                     ob_end_flush();


                 }
                 catch (phpmailerException $e) {
                     echo $e->errorMessage();
                 }
                 catch (Exception $e) {
                     echo $e->getMessage();
                 }
             }

         } else {

             ob_start();
           header('Location:index.php?type=modal&message=رمز عبور  با تکرار رمز عبور متفاوت است');    //this line works now
             ob_end_flush();


         }
     }


     else{
         ob_start();
       header('Location:index.php?message=شما قبلا ثبت نام کردید');    //this line works now
         ob_end_flush();
     }


}


if($type=='active')
{
   $key= $_GET['key'];
   $user_id=$_GET['d'];
   echo $key;
    $select= select("select * from link_users WHERE user_recovery='$key' and user_id='$user_id' ");
    $rec=fetch_result($select);
    $count=$select->rowCount();
    echo 'count:'.$count;
    if($count==1)
    {
        foreach ($rec as $rec)
        {

           $res=docommand("UPDATE link_users SET active=1 WHERE  user_id='$user_id'");
           if($res)
           {

               $_SESSION['username'] = $rec['user_email'];
               $_SESSION['password'] = $rec['user_pass'];
               $_SESSION['fullName']=$rec['user_fname'].' '.$rec['user_lname'];
               $_SESSION['type']='user';
               $_SESSION['id']=$rec['user_id'];
               echo $_SESSION['id'];

               // اطلاعات کاربر صحیح است
               ob_start();
              header('Location:user/index.php?message=با موفقیت وارد شدید');    //this line works now
               ob_end_flush();
           }
           else{
               echo 'udate nashod';
               ob_start();
              header('Location:user/index.php?message=مجددا تلاش کنید.');    //this line works now
               ob_end_flush();
           }
       }
   }
   else{
       echo 'nashod';
       ob_start();
       header('Location:index.php?message=لینک وارد شده معتبر نمیباشد. لطفا جهت فعال سازی حساب کاربری مجددا وارد شوید');    //this line works now
       ob_end_flush();
   }

}
if($type=="comments" ) {
    $message_fullName=$_POST['fullName'] ;
    $message_subject=$_POST['subject'] ;
    $message_email =$_POST['email'];
    $message_message=$_POST['comment'];
    $message_date=jdate("Y-n-j");

  echo $message_date;
  echo '<br>';
  echo $message_email;
    echo '<br>';
    echo $message_subject;
    echo '<br>';
    echo $message_fullName;

    if(docommand("INSERT INTO  link_comments (comment_fullName,comment_email,comment_subject,comment_text,comment_date) VALUES ('$message_fullName','$message_email','$message_subject','$message_message','$message_date')"))
 {   echo 'shod';
     ob_start();
     header('Location:index.php?message=پیام با موفقیت ارسال شد');    //this line works now
     ob_end_flush();

 }
 else
 {
     echo 'nashod';
     ob_start();
     header('Location:index.php?message=ورودی ها را به درستی وارد نمایید');    //this line works now
     ob_end_flush();

 }

}
if($type=="forgot" ) {
    $email = $_POST['email'];

    $select = select("SELECT * FROM  link_users WHERE user_email='$email'");
    $results = fetch_result($select);
    $count = $select->rowCount();
    echo 'count:'.$count;
    if ($count == 1) {

        foreach ($results as $results) {
            $rnd_number = rand();
            $user_id=$results['user_id'];
            $rnd = md5($rnd_number);
            echo $rnd;
            $body='کاربر گرامی، برای تغییر رمز عبور وارد لینک زیر شوید'.'<br><br>'.'http://joysell.ir/changePassword.php?key='.$rnd.'&&d='.$user_id;
            $user_id=$results['user_id'];
            $recovery = docommand("UPDATE link_users SET user_recovery='$rnd' WHERE  user_id='$user_id'");
            if ($recovery) {

// Include and initialize phpmailer class
                require_once('class.phpmailer.php');
                require_once('class.smtp.php');
                require_once('class.pop3.php');

                $mail = new PHPMailer(true);
                $mail->IsSMTP();
                try {

                    $mail->Host       = "mail.joysell.ir";
                    $mail->SMTPAuth   = true;
                    $mail->Username   = "info@joysell.ir";
                    $mail->Password   = "S3-3pSiranhost";
                    $mail->Body = "salam ";
                    $mail->AddReplyTo('info@joysell.ir', 'info');
                    $mail->AddAddress($email, 'joysell');
                  $mail->SetFrom('info@joysell.ir', 'joysell');
                  $mail->Subject = 'بازیابی رمز عبور-جوی سل ';
                  $mail->AltBody = 'Contact Us Sample Form From Iranhost';
                  $mail->CharSet = 'UTF-8';
                  $mail->ContentType = 'text/html';
                  $mail->MsgHTML($body);

  //$mail->AddAttachment('images/phpmailer.gif');
                   $mail->Send();

                    ob_start();
                    header('Location:index.php?type=modal&&message=لینک تغییر رمز عبور به ایمیل شما ارسال شد.');    //this line works now
                    ob_end_flush();


}
                catch (phpmailerException $e) {
                    echo $e->errorMessage();
                }
                catch (Exception $e) {
                    echo $e->getMessage();
                }
            }
        }
    }
    else{
        ob_start();
        header('Location:index.php?type=modal&&message=ایمیل وارد شده، موجود نیست.');    //this line works now
        ob_end_flush();
    }


}

if($type=="change_password"){
    $new_pass=$_POST['new_password'];
    $re_pass=$_POST['renew_password'];
    $hash_newpass=md5($new_pass);
     $id=$_POST['user_id'];
    $key=$_POST['key'];
     echo $hash_newpass;
     echo '<br>';
     echo $id;

    if($new_pass == $re_pass)
    {
        $result=docommand("UPDATE link_users SET user_pass='$hash_newpass' WHERE  user_id='$id'");
        if($result)
        {
            ob_start();
            header('Location:index.php?message=اطلاعات با موفقیت ثبت شد');    //this line works now
            ob_end_flush();
        }else{
            ob_start();
            header('Location:changePassword.php?key='.$key.'&&d='.$id.'&&message=ورودی ها را بررسی کرده و دوباره تلاش کنید');    //this line works now
            ob_end_flush();

        }
    }
    else
    {
        ob_start();
       header('Location:changePassword.php?key='.$key.'&&d='.$id.'&&message=رمز عبور جدید و تکرار آن بایکدیگر برابر نیست.');    //this line works now
        ob_end_flush();
    }
}

if($type=="order_plan"){
    $id=$_GET['id'];
    $user_id=$_SESSION['id'];
    $date=jdate("Y-n-j");

    $comand=docommand("INSERT INTO link_orderplan (plan_id,user_id,order_date)VALUES('$id','$user_id','$date')");

    if($comand){
        ob_start();
        header('Location:user/index.php?Page=Admin_Plans&&message=اطلاعات شما با موفقیت ثبت شد');    //this line works now
        ob_end_flush();
     }else{
        ob_start();
        header('Location:index.php?message=دوباره سعی کنید');    //this line works now
        ob_end_flush();
    }

}
if($type=="complaint" ) {
    $message_fullName=$_POST['fullName'] ;
    $message_subject=$_POST['subject'] ;
    $message_email =$_POST['email'];
    $message_mobile =$_POST['mobile'];
    $message_message=$_POST['text'];
    $message_date=jdate("Y-n-j");
    $select=select("INSERT INTO  link_complaints (com_fullName,com_subject,com_email,com_phone,com_date)
    VALUES ('$message_fullName','$message_subject','$message_email','$message_mobile','$message_date')");
    if($select)
    {
        ob_start();
        header('Location:index.php?message=پیام با موفقیت ارسال شد');    //this line works now
        ob_end_flush();

    }
    else
    {
        ob_start();
       header('Location:index.php?message=ورودی ها را به درستی وارد نمایید');    //this line works now
        ob_end_flush();
    }

}

?>