<?php
//شروع یک نشست
session_start();
//بررسی تنظیم شدن یا نشدن متغیرهای سشن
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])){
//در صورتی که متغیرهای سشن تنظیم نشده باشند، کاربر مجاز به دیدن ادامه صفحه نیست و او را به صفحه اصلی منتقل می کنیم
    header("location:../bank.php?message='لطفا نام کاربری و رمز عبور را وارد کنید'");
}
include('../DB.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="davoodi">
    <meta name="keyword" content="">
    <link rel="shortcut icon" href="../images/Icon.ico">

    <title>پنل کاربری- جویسل</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-3.2.rtl.css" rel="stylesheet">
    <!--external css-->
    <link href="../css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/owl.carousel.css" type="text/css">
    <link href="../css/style-responsive.css" rel="stylesheet" />
    <link href="../css/Datatables.css" rel="stylesheet" />
    <link href="../css/sumoselect.css" rel="stylesheet" />




<body>

<section id="container" class="">
    <!--header start-->
    <header class="header white-bg">
        <div class="sidebar-toggle-box">
            <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips fa fa-bars"></div>
        </div>
        <!--logo start-->
        <a href="#" class="logo"><img src="../images/LogoType.png" width="100" height="50"> </a>
        <!--logo end-->

        <div class="top-nav ">
            <!--search & user info start-->
            <ul class="nav pull-right top-menu">
                <li>
                    <input type="text" class="form-control search" placeholder="Search">
                </li>
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img alt="" src="uploads/users/<?php echo $_SESSION['id'] ?>.jpg">
                        <span class="username"><?php echo $_SESSION['fullName'] ?> </span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <div class="log-arrow-up"></div>
                        <li><a href="products.php"><i class="fa fa-globe"></i>ویترین آنلاین</a></li>
                        <li><a href="index.php?Page=Admin_Setting"><i class="fa fa-share-square "></i> تنظیمات</a></li>
                        <li><a href="exit.php"><i class="fa fa-sign-out"></i> خروج</a></li>
                    </ul>
                </li>
                <!-- user login dropdown end -->
            </ul>
            <!--search & user info end-->
        </div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu">
                <li class="active">
                    <a class="" href="../index.php">
                        <i class="fa fa-globe"></i>
                        <span>جوی سل</span>
                    </a>
                </li>
                <li >
                    <a class="" href="index.php?Page=Admin_Plans">
                        <i class="fa fa-tasks"></i>
                        <span>طرح ها </span>
                    </a>
                </li>

                <li >
                    <a class="" href="index.php?Page=Admin_Credit">
                        <i class="fa fa-money"></i>
                        <span>کیف پول </span>
                    </a>
                </li>
                <li >
                    <a class="" href="index.php?Page=Admin_Orders">
                        <i class="fa fa-exchange"></i>
                        <span>سفارشات</span>
                    </a>
                </li>

                <li >
                    <a class="" href="index.php?Page=Admin_Customers">
                        <i class="fa fa-user"></i>
                        <span>مشتریان</span>
                    </a>
                </li>
              <!--  <li >
                    <a class="" href="index.php?Page=Admin_Customers">
                        <i class="fa fa-user"></i>
                        <span>تیکت ها</span>
                    </a>
                </li> -->
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="fa fa-newspaper-o"></i>
                        <span>محصولات</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a href="index.php?Page=Admin_Products">لیست محصولات</a</li>
                        <li><a href="index.php?Page=Add_Product">افزودن محصول</a</li>
                        <li><a href="index.php?Page=Admin_Category"> دسته بندی ها</a> </li>
                        <li><a href="index.php?Page=Add_Category">  افزودن دسته بندی ها</a></li>

                    </ul>
                </li>
             <!--   <li >
                    <a class="" href="index.php?Page=Admin_Questions">
                        <i class="fa fa-question"></i>
                        <span>راهنما</span>
                    </a>
                </li> -->

            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">

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
        </section>
    </section>
    <!--main content end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.scrollTo.min.js"></script>
<script src="../js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="../js/owl.carousel.js" ></script>
<script src="../js/jquery.customSelect.min.js" ></script>
<script src="../js/DataTables.js" ></script>
<!--common script for all pages-->
<script src="../js/common-scripts.js"></script>
<script src="../js/jquery.sumoselect.js"></script>


<script>

    //owl carousel

    $(document).ready(function() {
        $("#owl-demo").owlCarousel({
            navigation : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem : true

        });

        $('#table').DataTable({
            // "paging":false,
            //"ordering":false,
            //"info":false
            // "order": [[ 0, "desc" ]]
            //"pagingType":"full_numbers"
        });

        setTimeout(function message_fade(){$("#message_fade").fadeOut();},1000);
        $('#multi_select').SumoSelect();

    });


   function  copyLink1() {
        var copyText = document.getElementById("myInput1");
        /* Select the text field */
        copyText.select();

        /* Copy the text inside the text field */
        document.execCommand("copy");

        /* Alert the copied text */

    }
    function  copyLink2() {
        var copyText = document.getElementById("myInput2");
        /* Select the text field */
        copyText.select();

        /* Copy the text inside the text field */
        document.execCommand("copy");

        /* Alert the copied text */

    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview1').css('background-image', 'url('+e.target.result +')');
                $('#imagePreview1').hide();
                $('#imagePreview1').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).ready(function () {
        $("#imageUpload").change(function() {
            readURL(this);
        });
        $("#imageUpload1").change(function() {
            readURL1(this);
        });
    })
</script>

</body>
</html>
