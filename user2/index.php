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

   <script>

       $(document).ready(function() {
           var tmp=true;
           switchCSS($(window).width());

           $(window).resize(function() {
               switchCSS($(window).width());
           });

           $('#menu_button').click(function () {
               if(tmp==true){
               $('.side-menu').css('display','block');
               $('.side-menu').css('width','300px');
               tmp=false;
               }else{
                   $('.side-menu').css('display','none');
                   $('.side-menu').css('width','20%');
                   tmp=true;
               }
           });
       });
   </script>

    <script type="text/javascript">
        function switchCSS(windowsize) {
            if (windowsize <768) {
                $('.side-menu').css('display','none');
                $('#menu_button').css('display','block');
            } else {
                $('.side-menu').css('display','block');

                $('#menu_button').css('display','none');
            }
        }

        $(document).ready(function(){

            $('#table').DataTable({
                // "paging":false,
                //"ordering":false,
                //"info":false
                // "order": [[ 0, "desc" ]]
                //"pagingType":"full_numbers"
            });
            setTimeout(function message_fade(){$("#message_fade").fadeOut();},1000);
            $("#username").mask("9999999999");
            $("#username").mask("9999999999");

            //$("#date_news").datepicker();
            $("#date_news").mask("9999-99-99");
            $("#date_comment").mask("9999-99-99");
            $("#user_birth").mask("9999-99-99");
            $("#mobile").mask("9999-9999999");
            $("#phone").mask("999-99999999");
            $("#sheba").mask("aa9999999999999999999999");

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
        <span class="pull-left"  ><img src="../images/menu.png" id="menu_button"></span>

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

            <li><a href="../index.php"><span class="fa fa-globe"></span>جوی سل </a></li>
            <li><a href="products.php"><span class="fa fa-globe"></span>نمایش ویترین آنلاین </a></li>

            <li  class="has-child">
                <a href="index.php?Page=Admin_Plans"><span class="fa fa-tasks"></span>طرح ها</a>

            </li>

            <li class="has-child">
                <a href="index.php?Page=Admin_Products"><span class="fa fa-newspaper-o"></span>محصولات</a>
                <ul>

                    <li><a href="index.php?Page=Add_Product">افزودن محصول</a> </li>
                    <li><a href="index.php?Page=Admin_Category"> دسته بندی ها</a> </li>
                    <li><a href="index.php?Page=Add_Category">  افزودن دسته بندی ها</a> </li>

                </ul>


            </li>
            <li><a href="index.php?Page=Admin_Credit"><span class="fa fa-money"></span>کیف پول</a></li>
            <li class="has-child">


                <a href="index.php?Page=Admin_Customers"><span class="fa fa-user"></span>مشتریان</a>

            </li>
            <li  class="has-child">
                <a href="index.php?Page=Admin_Orders"><span class="fa fa-exchange"></span>سفارشات</a>

            </li>

            <li  class="has-child">
                <a href="index.php?Page=Admin_Setting"><span class="fa fa-share-square"></span>تنظیمات</a>

            </li>

            <li><a href="exit.php"><span class="fa fa-sign-out"></span>خروج</a></li>

        </ul>

        <div class="content-wrapper">

            <?php
            $Page="Admin_Products";

            if (isset($_GET['Page'])){
                $GetPage=$_GET['Page'];
                include("Pages/".$_GET['Page'].".php");

                if ($GetPage=="Admin_Products"){
                    $Page="Admin_Products";
                }
                if ($GetPage=="Add_Product"){
                    $Page="Add_Product";
                }


                if ($GetPage=="Edit_Product"){
                    $Page="Edit_Product";
                    $id=$_GET['id'];
                }
                if ($GetPage=="Add_Category"){
                    $Page="Add_Category";

                }
                if ($GetPage=="Edit_Category"){
                    $Page="Edit_Category";

                }
                if ($GetPage=="Admin_Customers"){
                    $Page="Admin_Customers";

                }

                if ($GetPage=="Edit_Customer"){
                    $Page="Edit_Customer";

                }
                if ($GetPage=="Admin_Orders"){
                    $Page="Admin_Orders";

                }
                if ($GetPage=="Edit_Order"){
                    $Page="Edit_Order";

                }
                if ($GetPage=="Admin_Comments"){
                    $Page="Admin_Comments";

                }
            }else{
                include("Pages/Admin_Products.php");
            }
            ?>


        </div> <!-- .content-wrapper -->

    </main> <!-- .cd-main-content -->
</table>
</body>
</html>