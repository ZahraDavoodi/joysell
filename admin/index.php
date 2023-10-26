<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <title>.:بنیاد مهر حضرت زینب (س):.</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/bootstrap-3.2.rtl.css" type="text/css">

    <!-- Custom Fonts -->

    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/admin_panel.css" type="text/css">


    <!-- Plugin CSS -->
    <link rel="stylesheet" href="../css/admin_panel.css" type="text/css">
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/jquery.maskedinput.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
           // $("#username").mask("999-999999-9")
        });
    </script>

    <!-- Custom CSS -->


</head>
<body >

<div class="wrapper">
    <div class="container">
        <?php  if(isset($_GET['message'])) {?><p class="show_message" id="message_fade"><?php echo $_GET['message'];} ?></p>

        <form role="form" action="login.php" method="post" class="text-right">
        <fieldset>
                <legend>ورود مدیریت</legend>

            <input type="text" placeholder="نام کاربری" name="username">
            <input type="password" placeholder="رمز عبور" name="password">

                <input type="hidden" name="check" value="sended">

                <input type="checkbox" name="remember" value="true">


                    مرا به خاطر بسپار
            <input type="submit" id="login-button" value="ورود" name="submit">
            </fieldset>
        </form>
    </div>

    <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>


</body>
</html>
