<?php
session_start();
include "../DB.php";
include "../jdf.php";
connect();
$type= $_REQUEST["type"];
if(isset($_REQUEST["id"])){$id=$_REQUEST["id"];}
echo"$type";
echo"<br/>";
//insert into car
if($type=="edit_user")
{

    $user_fname=$_POST['fname'];
    $user_lname=$_POST['lname'];
    $user_ident=$_POST['ident'];
    $user_pass=$_POST['password'];
    $user_email=$_POST['email'];
    $user_phone=$_POST['phone'];
    $user_mobile=$_POST['mobile'];
    $user_accNum=$_POST['accNum'];
    $user_sheba=$_POST['sheba'];
    $user_bankName=$_POST['bankName'];
    $user_signUpDate=$_POST['signUpDate'];


    $result = docommand("UPDATE link_users SET user_fname='$user_fname',user_lname='$user_lname',user_pass='$user_pass',user_mobile='$user_mobile',user_phone='$user_phone',user_email='$user_email',user_signUpDate='$user_signUpDate',user_accNum='$user_accNum',user_bankName='$user_bankName',user_sheba='$user_sheba' WHERE user_id='$id'");
     echo $result;
    if($result){
        echo 'fgfff';
           ob_start();
           header('Location:index_admin.php?Page=Admin_Users&&message=اطلاعات مورد نظر با موفقیت تغییر کرد.');    //this line works now
           ob_end_flush();
       }
       else{
           if($result){

               ob_start();
               header('Location:index_admin.php?Page=Admin_Users&&message=ورودیها را بررسی کرده و دوباره امتحان کنید.');    //this line works now
               ob_end_flush();
           }
       }
}
if($type=="del_user")
{

    $result = docommand("DELETE FROM link_users  WHERE user_id='$id'");

    ob_start();
     header('Location:index_admin.php?Page=Admin_Users&&message=اطلاعات مورد نظر با موفقیت حذف شد.');    //this line works now
    ob_end_flush();

}


if($type=="del_comment")
{
    $result = docommand("DELETE FROM link_comments  WHERE comment_id='$id'");
    ob_start();
    header('Location:index_admin.php?Page=Admin_Comments&&message=اطلاعات مورد نظر با موفقیت حذف شد.');    //this line works now

    ob_end_flush();

}
if($type=="edit_plan")
{

    $plan_name=$_POST['name'];
    $plan_price=$_POST['price'];
    $plan_pnumber=$_POST['pnumber'];

   echo $plan_name;

    $result = docommand("UPDATE link_plans SET plan_name='$plan_name',plan_price='$plan_price',plan_pnumber='$plan_pnumber' WHERE plan_id='$id'");
    echo $result;
    if($result){

        ob_start();
       header('Location:index_admin.php?Page=Admin_Plans&&message=اطلاعات مورد نظر با موفقیت تغییر کرد.');    //this line works now
        ob_end_flush();
    }
    else{
        if($result){

            ob_start();
           header('Location:index_admin.php?Page=Admin_Plans&&message=ورودیها را بررسی کرده و دوباره امتحان کنید.');    //this line works now
            ob_end_flush();
        }
    }
}
if($type=="del_plan")
{
    $result = docommand("DELETE FROM link_plans  WHERE plan_id='$id'");
    ob_start();
    header('Location:index_admin.php?Page=Admin_Plans&&message=اطلاعات مورد نظر با موفقیت حذف شد.');    //this line works now

    ob_end_flush();

}
if($type=="edit_payment")
{
    $status1= $_POST['status'];
    $payment=1;
    //اگر پرداخت انجام شد
    if($status1=='در حال بررسی') {
        if ($payment == 1) {
            $description = 'پرداخت شده در تاریخ' . jdate('Y-m-d');
            $date = jdate('Y-m-d');
            $status = 'پرداخت شده';

            $result = docommand("UPDATE link_payment SET payment_status='$status', payment_sendDate='$date',payment_description='$description'  WHERE payment_id='$id' ");
            if ($result) {
                ob_start();
                header('Location:index_admin.php?Page=Admin_Payments&&message=پرداخت با موفقیت انجام شد.');    //this line works now

                ob_end_flush();
            } else {
                ob_start();
                header('Location:index_admin.php?Page=Admin_Payments&&message=پرداخت انجام نشد . مجددا تلاش کنید');    //this line works now

                ob_end_flush();
            }
        }
    }else{
        ob_start();
        header('Location:index_admin.php?Page=Admin_Payments&&message=این در خواست قبلا پرداخت شده است');    //this line works now

        ob_end_flush();
    }
}
if($type=="ok_user")
{
    $result = docommand("UPDATE link_users SET user_state=1 WHERE user_id='$id'");
    ob_start();
    header('Location:index_admin.php?Page=Admin_Auth&&message=اطلاعات هویتی کاربر مورد نظر تایید شد.');    //this line works now
    ob_end_flush();

}
if($type=="notOk_user")
{
    $result = docommand("UPDATE link_users SET user_state=2 WHERE user_id='$id'");
    ob_start();
    header('Location:index_admin.php?Page=Admin_Auth&&message=اطلاعات هویتی کاربر مورد نظر رد شد.');    //this line works now
    ob_end_flush();
}

?>