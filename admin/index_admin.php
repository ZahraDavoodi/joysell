<?php
//شروع یک نشست
session_start();
//بررسی تنظیم شدن یا نشدن متغیرهای سشن
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])){
//در صورتی که متغیرهای سشن تنظیم نشده باشند، کاربر مجاز به دیدن ادامه صفحه نیست و او را به صفحه اصلی منتقل می کنیم
    header("location:../index.php?message='لطفا نام کاربری و رمز عبور را وارد کنید'");
}
include('../DB.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>:پنل مدیریت:</title>



    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" >
    <link rel="stylesheet" type="text/css" href="../css/nav.css" >

    <link rel="stylesheet" href="../css/admin_panel.css"> <!-- Resource style -->
    <link rel="stylesheet" href="../css/bootstrap.min.css"> <!-- Resource style -->
    <link rel="stylesheet" href="../css/bootstrap-3.2.rtl.css"> <!-- Resource style -->
    <link rel="stylesheet" type="text/css" href="../css/multi.css" >
    <!-- DATA Table -->
    <link rel="stylesheet" href="../css/Datatables.css"> <!-- Resource style -->
    <script src="../js/DataTables.js"></script> <!-- Modernizr -->


    <script src="../js/modernizr.js"></script> <!-- Modernizr -->


    <link rel="stylesheet" type="text/css" href="../css/Datatables.css" >

    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/jquery.maskedinput.js"></script>


    <script type="text/javascript" src="../js/DataTables.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>

    <script type="text/javascript" src="../js/calendar.all.js.js"></script>
    <script type="text/javascript" src="../js/calendar.js"></script>
    <script type="text/javascript" src="../js/jquery.ui.datepicker-cc-fa.js"></script>
    <script type="text/javascript" src="../js/jquery.ui.datepicker-cc.js"></script>
    <script type="text/javascript" src="../js/jquery.ui.core.js"></script>
    <script type="text/javascript" src="../js/multi.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#table').DataTable({
                // "paging":false,
                //"ordering":false,
                //"info":false
                // "order": [[ 0, "desc" ]]
                //"pagingType":"full_numbers"
            });
            setTimeout(function message_fade(){$("#message_fade").fadeOut();},6000);
            $("#username").mask("9999999999");
            $("#username").mask("9999999999");

            //$("#date_news").datepicker();
            $("#date_news").mask("9999-99-99");
            $("#date_comment").mask("9999-99-99");
            $("#user_birth").mask("9999-99-99");
            $("#mobile").mask("9999-9999999");
            $("#phone").mask("999-99999999");

            var select = document.getElementById('multi_select');
            multi( select, {
                non_selected_header: 'دسته بندیها',
                selected_header: 'دسته بندی های انتخاب شده'
            });
        });
    </script>


</head>
<body>
<header class="cd-main-header">
    <a  class="cd-logo"><img src="#" alt="Logo"></a>
    <span ><?php echo $_SESSION['fullName'] ?>  عزیز </span>
    <!--
        <div class="cd-search is-hidden">
            <form action="#0">
                <input type="search" placeholder="Search...">
            </form>
        </div> cd-search -->

</header> <!-- .cd-main-header -->

<main class="cd-main-content">
    <ul class="side-menu">
        <li><a href="#"><span class="fa fa-bars"></span>منو</a></li>
        <li><a href="index_admin.php?Page=Admin_Users"><span class="fa fa-user"></span>کاربران </a></li>

        <li class="has-child">
            <a href="index_admin.php?Page=Admin_Plans"><span class="fa fa-archive"></span>طرح ها</a>

        </li>
        <li  class="has-child">
            <a href="index_admin.php?Page=Admin_Trans"><span class="fa fa-exchange"></span>تراکنشها</a>

        </li>
        <li  class="has-child">
            <a href="index_admin.php?Page=Admin_Payments"><span class="fa fa-send"></span>درخواست های واریز</a>

        </li>
        <li  class="has-child">
            <a href="index_admin.php?Page=Admin_Comments"><span class="fa fa-comment"></span>نظرات</a>

        </li>
        <li  class="has-child">
            <a href="index_admin.php?Page=Admin_Auth"><span class="fa fa-ban"></span>تایید هویت کاربران</a>

        </li>
        <li><a href="exit.php"><span class="fa fa-sign-out"></span>خروج</a></li>

    </ul>

    <div class="content-wrapper row">

        <?php
        $Page="Admin_Users";

        if (isset($_GET['Page'])){
            $GetPage=$_GET['Page'];
            include("Pages/".$_GET['Page'].".php");

            if ($GetPage=="Admin_Users"){
                $Page="Admin_Users";
            }
            if ($GetPage=="Edit_User"){
                $Page="Edit_User";
                $id=$_GET['id'];
            }
            if ($GetPage=="Admin_Trans"){
                $Page="Admin_Trans";
            }
            if ($GetPage=="Admin_Comments"){
                $Page="Admin_Comments";

            }
            if ($GetPage=="Admin_Plans"){
                $Page="Admin_Plans";
            }
            if ($GetPage=="Edit_Plan") {
                $Page = "Edit_Plan";
            }
            if ($GetPage=="Admin_Trans"){
                $Page="Admin_Trans";
            }
            if ($GetPage=="Admin_Trans"){
                $Page="Admin_Trans";
            }
            if ($GetPage=="Admin_Payments"){
                $Page="Admin_Payments";
            }
            if ($GetPage=="Admin_Auth"){
                $Page="Admin_Auth";
            }
        }else{
            include("Pages/Admin_Users.php");
        }
        ?>


    </div> <!-- .content-wrapper -->

</main> <!-- .cd-main-content -->
</table>
</body>
</html>