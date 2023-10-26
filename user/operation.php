<?php
session_start();
$user_id=$_SESSION['id'];
include "../DB.php";
include "../jdf.php";
connect();
if(isset($_REQUEST["id"])){$id=$_REQUEST["id"];}
$type=$_REQUEST["type"];
echo"$type";
echo"<br/>";
//insert into car
if($type=="edit_product" )
{
    $product_name=$_POST['name'];
    $product_price=$_POST['price'];
    $product_number=$_POST['number'];
    $product_description=$_POST['description'];
    $product_cat=$_POST['cat'];
    $product_cat=serialize($product_cat);





    $result = docommand("UPDATE link_products SET product_name='$product_name',product_price='$product_price',product_number='$product_number',product_description='$product_description',product_cat='$product_cat' WHERE product_id='$id'");

    /**file upload**/
    $file_name = $user_id . '-' . $id . '.jpg';
    $target_dir = "uploads/products/";
    $target_file = $target_dir . basename($file_name);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        //$uploadOk = 0;
    }

    // Check file size
    if ($_FILES["file"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["file"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }


    if($result){

        ob_start();
        header('Location:index.php?Page=Admin_Products&&message=اطلاعات مورد نظر با موفقیت تغییر کرد.');    //this line works now
        ob_end_flush();
    }
    else{


        ob_start();
        header('Location:index.php?Page=Admin_Products&&message=ورودیها را بررسی کرده و دوباره امتحان کنید.');    //this line works now
        ob_end_flush();

    }
}
if($type=="add_product"){

    $product_name=$_POST['name'];
    echo $product_name;
    $product_price=$_POST['price'];
    $product_number=$_POST['number'];
    $product_description=$_POST['description'];
    $keywords=$_POST['keywords'];
    $user_id=$_SESSION['id'];

    $cat=$_POST['cat'] ;
    $cat_name = serialize($cat);
    $date=jdate('Y-m-d');

    $select1=select("select * from link_products where user_id='$user_id'");
    $count=$select1->rowCount();
    $number=0;
    $select2=select("select * from link_orderplan where user_id='$user_id'");
    $plans=fetch_result($select2);
    foreach ($plans as $plan)
    {
        if($plan['plan_id']==1)
        {
            $number +=5;
        }
        if($plan['plan_id']==2)
        {
            $number +=10;
        }
        if($plan['plan_id']==3)
        {
            $number +=20;
        }
    }
    echo 'number:'.$number;
    echo 'count:'.$count;
    if($number>=$count)
    {
        echo 'shod';
        $select=select("select max(product_id) as max_id from link_products");
        $rec=fetch_result($select);
        foreach ($rec as $rec){
            $product_id=$rec['max_id']+1;
        }

        $link='L'.$user_id.'L'.$product_id;

        //$short_url= dirname(__DIR__).'\page.php?link='.$link;
        $short_url='http://joysell.ir/user/sell_product.php?link='.$link;


        echo $short_url;
        echo '<br> fff:'.is_string($short_url);

        $result = docommand("INSERT INTO link_products (product_name,product_price,product_number,product_description,product_link,user_id,product_keywords,product_cat,product_inputDate) VALUES ('$product_name','$product_price','$product_number','$product_description','$short_url','$user_id','$keywords','$cat_name','$date')");


        /**file upload**/
        $file_name = $user_id . '-' . $product_id . '.jpg';
        $target_dir = "uploads/products/";
        $target_file = $target_dir . basename($file_name);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["file"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["file"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                echo "The file " . basename($_FILES["file"]["name"]) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }


        if($result){

            ob_start();
            header('Location:index.php?Page=Admin_Products&&message=اطلاعات مورد نظر با موفقیت تغییر کرد.<br>'.'لینک کوتاه'.'<br>'.$short_url);    //this line works now
            ob_end_flush();
        }
        else{


            ob_start();
            header('Location:index.php?Page=Admin_Products&&message=ورودیها را بررسی کرده و دوباره امتحان کنید.');    //this line works now
            ob_end_flush();

        }


    }


    else
    {
        ob_start();
        //header('Location:index.php?Page=Admin_Products&&message=تعداد مجاز افزودن محصول شما به اتمام رسیده است، برای افزودن مورد جدید با طرح جدیدی خریداری کنید.');    //this line works now
        ob_end_flush();
    }




}
if($type=="del_product")
{
    $result = docommand("DELETE FROM link_products  WHERE product_id='$id'");
    ob_start();
    header('Location:index.php?Page=Admin_Products&&message=اطلاعات مورد نظر با موفقیت حذف شد.');    //this line works now
    ob_end_flush();

}
if($type=="add_category") {
    $category_name = $_POST['name'];
    $user_id = $_SESSION['id'];



    $result = docommand("INSERT INTO link_category (cat_name,user_id) VALUES('$category_name','$user_id')");

    if($result){

        ob_start();
        header('Location:index.php?Page=Admin_Category&&message=اطلاعات مورد نظر با موفقیت  ثبت شد ');    //this line works now
        ob_end_flush();
    }
    else{


        ob_start();
        header('Location:index.php?Page=Admin_Category&&message=ورودیها را بررسی کرده و دوباره امتحان کنید.');    //this line works now
        ob_end_flush();

    }
}
if($type=="del_category")
{
    $result = docommand("DELETE FROM link_category  WHERE cat_id='$id'");
    ob_start();
    header('Location:index.php?Page=Admin_Category&&message=اطلاعات مورد نظر با موفقیت حذف شد.');    //this line works now
    ob_end_flush();

}
if($type=="edit_category")
{
    $cat_name=$_POST['name'];
    $result = docommand("UPDATE link_category SET cat_name='$cat_name' WHERE cat_id='$id'");
    if($result){

        ob_start();
        header('Location:index.php?Page=Admin_Category&&message=اطلاعات مورد نظر با موفقیت تغییر کرد');    //this line works now
        ob_end_flush();
    }
    else{


        ob_start();
        header('Location:index.php?Page=Admin_Category&&message=ورودیها را بررسی کرده و دوباره امتحان کنید.');    //this line works now
        ob_end_flush();

    }

}
if($type=="edit_customer" )

{
    $customer_fname=$_POST['fname'];
    $customer_lname=$_POST['lname'];
    $customer_mobile=$_POST['mobile'];
    $customer_email=$_POST['email'];
    echo $customer_fname.'<br>';
    echo $customer_lname.'<br>';
    echo $customer_mobile.'<br>';
    echo $customer_email.'<br>';



    $result = docommand("UPDATE link_customers SET customer_fname='$customer_fname',customer_lname='$customer_lname',customer_email='$customer_email',customer_mobile='$customer_mobile' WHERE customer_id='$id'");

    if($result){

        ob_start();
        header('Location:index.php?Page=Admin_Customers&&message=اطلاعات مورد نظر با موفقیت تغییر کرد.');    //this line works now
        ob_end_flush();
    }
    else{


        ob_start();
        header('Location:index.php?Page=Admin_Customers&&message=ورودیها را بررسی کرده و دوباره امتحان کنید.');    //this line works now
        ob_end_flush();

    }
}
if($type=="del_customer")
{
    $result = docommand("DELETE FROM link_customers  WHERE customer_id='$id'");
    ob_start();
    header('Location:index.php?Page=Admin_Customer&&message=اطلاعات مورد نظر با موفقیت حذف شد.');    //this line works now
    ob_end_flush();

}
if($type=="del_comment")
{
    $result = docommand("DELETE FROM link_comments  WHERE comment_id='$id'");
    ob_start();
    header('Location:index.php?Page=Admin_Comments&&message=اطلاعات مورد نظر با موفقیت حذف شد.');    //this line works now
    ob_end_flush();

}
if($type=="payment")
{
    $amount=$_POST['amount'];
    $id=$_SESSION['id'];
    $select=select("select * from link_users where user_id='$id'");
    $res=fetch_result($select);
    foreach ($res as $res)
    {   if($amount>0) {
        if ($amount <= $res['user_credit']) {
            $sheba = $_POST['sheba'];
            $description = 'درخواست در تاریخ  ' . jdate('Y-M-d');
            $status = ' در حال بررسی';
            $date=jdate('Y-m-d');

            $result = docommand("INSERT INTO link_payment (user_id,payment_amount,payment_description,payment_status,payment_sheba,payment_date)VALUES('$id','$amount','$description','$status','$sheba','$date')");

            if ($result) {
                $credit = $res['user_credit'] - $amount;
                $result2 = docommand("UPDATE link_users SET user_credit='$credit'");

                if($result2)
                {
                    ob_start();
                    header('Location:index.php?Page=Admin_Credit&&message=درخواست شما با موفقیت ثبت شد. بعد از بررسی پرداخت خواهد شد');    //this line works now
                    ob_end_flush();

                }
            }
        } else {
            ob_start();
            header('Location:index.php?Page=Admin_Credit&&message=مبلغ وارد شده بیشتر از اعتبار شماست');    //this line works now
            ob_end_flush();

        }
    }
    else{
        ob_start();
        header('Location:index.php?Page=Admin_Credit&&message=اعتبار شما صفر است');    //this line works now
        ob_end_flush();

    }
    }
}

if($type=='setting'){


    echo $user_id;
    /**file upload**/
    $file_name = $user_id  .'_baner.jpg';
    $target_dir = "uploads/stores/";
    $target_file = $target_dir . basename($file_name);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        unlink($target_file);
        //$uploadOk = 0;
    }

    // Check file size
    if ($_FILES["file"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["file"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }




    //update setting

    $store_name=$_POST['name'];
    $store_description=$_POST['description'];
    $result=docommand("UPDATE link_storeinfo SET store_name='$store_name', store_description='$store_description' WHERE user_id='$user_id'");
    if($result)
    {
        ob_start();
        header('Location:index.php?Page=Admin_Setting&&message=اطلاعات شما با موفقیت ثبت شد');    //this line works now
        ob_end_flush();
    }
    else{
        ob_start();
        header('Location:index.php?Page=Admin_Setting&&message=لطفا ورودی ها را بررسی کنید و دوباره تلاش کنید');    //this line works now
        ob_end_flush();
    }

}


if($type=='change_password') {

    $old_pass=$_POST['old_password'];
    $new_pass=$_POST['new_password'];
    $re_pass=$_POST['renew_password'];
    $hash_pass=md5($old_pass);
    $hash_newpass=md5($new_pass);
    echo $hash_pass;

    echo $hash_newpass;

    $select=select("SELECT * FROM link_users WHERE  user_id='$user_id'");
    $res=fetch_result($select);
    foreach ($res as $res)
    {
        $pass=$res['user_pass'];
        if($pass==$hash_pass)
        {
            if($new_pass == $re_pass)
            {
                $result=docommand("UPDATE link_users  SET user_pass='$hash_newpass'  WHERE  user_id='$user_id'");
                if($result)
                {

                    ob_start();
                    header('Location:index.php?Page=Admin_Setting&&message=اطلاعات با موفقیت ثبت شد');    //this line works now
                    ob_end_flush();
                }else{
                    ob_start();
                    header('Location:index.php?Page=Admin_Setting&&message=ورودی ها را بررسی کرده و دوباره تلاش کنید');    //this line works now
                    ob_end_flush();

                }
            }
            else
            {
                ob_start();
                header('Location:index.php?Page=Admin_Setting&&message=رمز عبور جدید و تکرار آن بایکدیگر برابر نیست.');    //this line works now
                ob_end_flush();
            }


        }
        else
        {
            ob_start();
            header('Location:index.php?Page=Admin_Setting&&message=رمز عبور قدیمی شما نادرست است.');    //this line works now
            ob_end_flush();
        }
    }



}

if($type=="personal") {

    if ($_FILES['image']['size']>0 )

    {

        echo 'ddd';
        /**file upload**/
        $file_name = $user_id . '.jpg';
        $target_dir = "uploads/users/";
        $target_file = $target_dir . basename($file_name);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                ob_start();
                header('Location:index.php?Page=Admin_Setting&&message=فایل ارسال شده برای تصویر پروفایل دارای فرمت تصویر نمیباشد.');    //this line works now
                ob_end_flush();

                $uploadOk = 0;
            }


            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                unlink($target_file);
                //$uploadOk = 0;
            }

            // Check file size
            if ($_FILES["image"]["size"] > 500000) {
                ob_start();
                header('Location:index.php?Page=Admin_Setting&&message=حجم تصویر وارد شده برای پروفایل بسیار بزرگ است.');    //this line works now
                ob_end_flush();

                $uploadOk = 0;
            }

            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "jpeg") {
                ob_start();
                header('Location:index.php?Page=Admin_Setting&&message=لطفا تصویر با فرمت jpg باشد.');    //this line works now
                ob_end_flush();

                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                header('Location:index.php?Page=Admin_Setting&&message=متاسفانه فایل ارسالی ، اپلود نشد . دوباره تلاش کنید');    //this line works now
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";

                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }




        ob_start();
        // header('Location:index.php?Page=Admin_Setting&&message=فایل به درستی آپلود شد.');    //this line works now
        ob_end_flush();

    }

    if ($_FILES['personal']['size']>0)
    {
        /**file upload**/
        $file_name = $user_id . '.jpg';
        $target_dir = "uploads/nationalCard/";
        $target_file = $target_dir . basename($file_name);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["personal"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo $check["mime"];
                header('Location:index.php?Page=Admin_Setting&&message=فایل ارسالی جهت کارت ملی ، یک تصویر نیست');    //this line works now
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            unlink($target_file);
            //$uploadOk = 0;
        }

        // Check file size
        if ($_FILES["personal"]["size"] > 500000) {
            header('Location:index.php?Page=Admin_Setting&&message=فایل ارسالی جهت کارت ملی، بسیار بزرگ است');    //this line works now
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" &&  $imageFileType != "jpeg") {
            header('Location:index.php?Page=Admin_Setting&&message=لطفا تصویر کارت ملی با فرمت jpg باشد.');    //this line works now
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            header('Location:index.php?Page=Admin_Setting&&message=متاسفانه فایل ارسالی جهت کارت ملی به درستی آپلود نشد');    //this line works now
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["personal"]["tmp_name"], $target_file)) {
                echo "The file " . basename($_FILES["personal"]["name"]) . " has been uploaded.";

            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    ob_start();
    header('Location:index.php?Page=Admin_Setting&&message=فایلها به درستی آپلود شد.');    //this line works now
    ob_end_flush();

}


if($type=='login_customer'){

    $username=$_POST['username'];
    $password=$_POST['password'];
    $GLOBALS['link']=connect();
    $link=$_SESSION['product_link'];
    echo 'link : '.$link;
    echo 'type :'.is_string($link);
    echo '<br>';
    $link2=explode('=',$link);
    print_r($link2[1]);

    $hash_password = md5($password);
    echo "$hash_password";

   
        $result = select("SELECT * FROM link_customers WHERE customer_email = '$username' AND customer_password = '$hash_password'");
        $user = fetch_result($result);
        print_r($user);
      

        // تعداد ردیف های موجود
        $count = $result->rowCount();
        echo 'count is:' . $count;

        if ($count ==1) {
            foreach ($user as $user) {
                $_SESSION['username_customer'] = $_POST['username'];
                $_SESSION['password_customer'] = $_POST['password'];
                $_SESSION['fullName_customer'] = $user['customer_fname'] ;
                $_SESSION['type'] = 'customer';
                $_SESSION['id'] = $user['user_id'];
                $_SESSION['customer_id'] = $user['customer_id'];


                // اطلاعات کاربر صحیح است
                ob_start();
               // header('Location:sell_product.php?link='.$link2[1].'&&message=با موفقیت وارد شدید');    //this line works now
                ob_end_flush();

            }
            // اطلاعات کاربر درست است، تنظیم مجوز های استفاده از بخش اعضاء

        } else {
            // اطلاعات کاربر صحیح نیست
            echo "اطلاعات وارد شده صحیح نیست!<br />";
            ob_start();
           // header('Location:?type=modal&message=اطلاعات وارد شده صحیح نیست. ');    //this line works now
            ob_end_flush();

        }

//پایان ارتباط با پایگاه داده

}

if($type=="signUp_customer" )
{
    $user_signUpDate=jdate("Y-n-j");
    $user_fname=$_POST['fname'];
    $user_address=$_POST['address'];
    $user_pass=$_POST['password'];
    $hash_pass=md5($user_pass);
    $re_password=$_POST['repassword'];
    $user_email=$_POST['email'];
    $user_mobile=$_POST['mobile'];
    $link=$_SESSION['product_link'];
    $user_id=$_SESSION['user_id'];
    echo 'link : '.$link;
    echo 'type :'.is_string($link);
    echo '<br>';
    $link2=explode('=',$link);
    print_r($link2[1]);
    $select= select("select max(customer_id) as max_id from link_customers");
    $rec=fetch_result($select);
    $customer_id=0;
    foreach ($rec as $rec)
    {
        $customer_id=$rec['max_id']+1;
        echo $customer_id;
    }

    $result1=select("select * from link_customers WHERE customer_email='$user_email'");
    $count = $result1->rowCount();
    echo 'count:'.$count;


    if($count==0) {

        if ($user_pass == $re_password) {

            $rnd_number = rand();
            $rnd = md5($rnd_number);
            echo $rnd;

            if((docommand("INSERT INTO  link_customers (customer_fname,customer_password,customer_email,customer_mobile,customer_signUpDate,customer_recovery,customer_address,user_id)VALUES ('$user_fname','$hash_pass','$user_email','$user_mobile','$user_signUpDate','$rnd','$user_address','$user_id')")))
            {
                $_SESSION['username_customer'] = $_POST['username'];
                $_SESSION['password_customer'] = $_POST['password'];
                $_SESSION['fullName_customer'] = $user_fname ;
                $_SESSION['type'] = 'customer';
                $_SESSION['id'] = $user_id;
                $_SESSION['customer_id'] = $customer_id;
				
				
				$body='کاربر گرامی، جهت فعال سازی حساب کاربری خود'.'<br><br>'.'http://joysell.ir/operation.php?key='.$rnd.'&&d='.$user_id.'&&type=active';
                 require_once('../class.phpmailer.php');
                 require_once('../class.smtp.php');
                 require_once('../class.pop3.php');

                 $mail = new PHPMailer(true);
                 $mail->IsSMTP();
                 try {
                     $body="به جویسل خوش آمدید. با جویسل از خرید لذت ببرید";

                     $mail->Host       = "mail.joysell.ir";
                     $mail->SMTPAuth   = true;
                     $mail->Username   = "info@joysell.ir";
                     $mail->Password   = "S3-3pSiranhost";
                     $mail->Body = "salam ";
                     $mail->AddReplyTo('info@joysell.ir', 'info');
                     $mail->AddAddress($user_email, 'joysell');
                     $mail->SetFrom('info@joysell.ir', 'joysell');
                     $mail->Subject = 'عضویت در جویسل به عنوان مشتری ';
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
                header('Location:sell_product.php?link='.$link2[1].'&&message=عضویت با موفقیت انجام شد');    //this line works now
                ob_end_flush();
            }

        } else {

            ob_start();
            header('Location:?type=modal&message=رمز عبور  با تکرار رمز عبور متفاوت است');    //this line works now
            ob_end_flush();
        }
    }


    else{
        ob_start();
        header('Location:'.$link.'?message=شما قبلا ثبت نام کردید');    //this line works now
        ob_end_flush();
    }


}