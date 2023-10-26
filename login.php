<?php
//شروع یک نشست
session_start();
//دریافت و تنظیم متغیرهای ارسال شده توسط کاربر
@$username = $_POST['username'];
echo"$username";
echo '<br>';
@$password = $_POST['password'];
echo"$password";
@$check = $_POST['check'];
@$remember = $_POST['remember'];
if($remember==true)
{
    $cookie_name = "user";
    $cookie_value = $_POST['username'];
//expiriry time. 86400 = 1 day (86400*30 = 1 month)
    $expiry = time() + (86400 * 30);

    if($remember == 'true'){
        //setting cookie variable
        setcookie($cookie_name, $cookie_value, $expiry);
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



</head>
<body>
<p>
  <?php
include "DB.php";

connect();
$GLOBALS['link']=connect();


 $check_error = 0;
//بررسی معتبر بودن اطلاعات ارسالی کاربر
//نام کاربری

  if (!isset($username) || $username == ''){
	 header('Location:index.php?type=modal&message=فیلد نام کاربری نباید خالی باشد ');

    $check_error = 1;
}
//کلمه عبور
elseif (!isset($password) || $password == ''){
	 header('Location:index.php?type=modal&message=فیلد رمزعبور نباید خالی باشد ');

    $check_error = 1;
}
//$username = mysqli_real_escape_string($GLOBALS['link'],$username);
$hash_password = md5($password);
echo "$hash_password";

if ($check_error != 1 && $check == 'sended'){
    //تطبیق اطلاعات کاربر با آنچه که در دیتابیس ذخیره شده
        print("<br/>".$check_error);
          $result = select ("SELECT * FROM link_users WHERE user_email = '$username' AND user_pass = '$hash_password'");
            $user=fetch_result($result);



    // تعداد ردیف های موجود
    $count = $result->rowCount();
    echo  'count is:'.$count;

    if($count > 0){
        foreach($user as $user)

        {
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $_POST['password'];
            $_SESSION['fullName']=$user['user_fname'].' '.$user['user_lname'];
            $_SESSION['type']='user';
            $_SESSION['id']=$user['user_id'];
            echo $_SESSION['id'];

            // اطلاعات کاربر صحیح است
            ob_start();
header('Location:user/index.php?message=با موفقیت وارد شدید');    //this line works now
            ob_end_flush();

        }
        // اطلاعات کاربر درست است، تنظیم مجوز های استفاده از بخش اعضاء

    }
    else{
        // اطلاعات کاربر صحیح نیست
        echo "اطلاعات وارد شده صحیح نیست!<br />";
				ob_start();
            header('Location:index.php?type=modal&message=اطلاعات وارد شده صحیح نیست. ');    //this line works now
         ob_end_flush();

    }
}
//پایان ارتباط با پایگاه داده

disconnect();
?>

</body>
</html>
