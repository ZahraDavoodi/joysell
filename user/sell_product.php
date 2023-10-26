<!DOCTYPE html>

<?php
session_start();
$link=$_GET['link'];
$cat=1;

$parts=explode("L",$link);
$user_id=$parts[1];
$product_id=$parts[2];
$product_price=$parts[3];


include '../DB.php';
connect();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="../images/Icon.ico">
    <meta name="keywords" content="<?php
    $select2=select("SELECT * FROM link_products WHERE product_id='$product_id'");

    $res2=fetch_result($select2);
    foreach ($res2 as $res2){  echo $res2['product_keywords']; ?>">

    <meta name="description" content="<?php  echo $res2['product_description'];} ?>">
    <title></title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">


    <!-- Custom Fonts -->

    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">


    <!-- Plugin CSS -->
    <link rel="stylesheet" href="../css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/creative2.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">


    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">

    <script src="../js/jquery-2.1.4.js"></script>
    <script src="../js/owl.carousel.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                nav:true,
                dots:false,
                lazyLoad: true,
                margin: 10,
                autoplay:true,
                autoplayTimeout:1000,
                autoplayHoverPause:true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    600: {
                        items: 3,
                        nav: true
                    },
                    960: {
                        items: 3,
                        nav: true
                    },
                    1200: {
                        items:4,
                        nav: true
                    }
                }
            });
        })
    </script>

</head>
<body dir="rtl">

<div class="container-fluid head_sell">
    <ul>
        <li><a href="../index.php">جویسل</a></li>
        <li><a href="products.php?id=<?php echo $user_id; ?>">نمایش  همه محصولات</a></li>


        <?php if(isset($_SESSION['type']) && ($_SESSION['type']=='customer')){ ?>
            <li class="dropdown">
                <div class="dropdown-toggle" data-toggle="dropdown">
                    <?php echo $_SESSION['fullName_customer']; ?>
                    <i class="caret"></i></div>
                <ul class="dropdown-menu">
                    <li><a href="#"  data-toggle="modal" data-target="#orders">سفارشات شما</a></li>
                   
                    <li><a href="exit.php">خروج</a></li>
                </ul>
            </li>

        <?php } else{ ?>

            <li> <a  href=" #"  data-toggle="modal" data-target="#myModal">ورود/ عضویت</a></li>

        <?php } ?>
        </li>


    </ul>
    <span>
    <?php

    $select1=select("SELECT * FROM link_storeinfo WHERE user_id='$user_id'");

    $res1=fetch_result($select1);
    $count1=$select1->rowCount();

    if($count1==1)
    {
        foreach ($res1 as $res1)
        {
            echo $res1["store_name"];
        }

    }
    else{
        echo '<p class="text-center">آدرس شما نادرست است. لطفا بررسی کنید و دوباره امتحان کنید</p>';
    }

    ?>
     </span>


</div>

<div class="container">


    <div class="row sell_product">
        <div class="col-sm-6 col-xs-12 text-center">
            <img  src="<?php $target='uploads/products/'.$user_id.'-'.$product_id.'.jpg'; if(file_exists($target)){ echo $target;} else {echo 'uploads/products/default.jpg';} ?>" class="img-responsive img-thumbnail">
        </div>


        <?php
        $select2=select("SELECT * FROM link_products WHERE product_id='$product_id'");

        $res2=fetch_result($select2);
        $count2=$select2->rowCount();
        if($count2==1) {
            foreach ($res2 as $res2)
            {


                ?>

                <div class="col-sm-6 col-xs-12">
                    <table class="table text-right" style="direction: rtl">
                        <tr>
                            <td>عنوان محصول</td>
                            <td><?php echo $res2['product_name']; ?></td>
                        </tr>
                        <tr>
                            <td>قیمت محصول</td>
                            <td><?php echo $res2['product_price']; ?> تومان</td>
                        </tr>

                        <tr>
                            <td>توضیحات محصول</td>
                            <td><?php echo $res2['product_description']; ?></td>
                        </tr>
                        <tr>
                            <td>دسته بندی</td>
                            <td><?php global $cat; $cat=unserialize($res2['product_cat']);
                                for ($i=0;$i<sizeof($cat);$i++) {
                                    echo $cat[$i].', ';
                                } ?></td>
                        </tr>
                        <tr>
                            <td>کلمات کلیدی</td>
                            <td><?php  echo $res2['product_keywords'];?></td>
                        </tr>
                    </table>
                    <?php if(isset($_SESSION['type']) && ($_SESSION['type']=='customer')){ ?>


                        <form action="../payment.php" method="post">
                            <input type="hidden" name="price" value="<?php  echo $res2['product_price']*10;?>">
                            <input type="hidden" name="user_id" value="<?php  echo $res2['user_id'];?>">
                            <input type="hidden" name="product_id" value="<?php  echo $res2['product_id'];?>">

                            <input type="hidden" name="callback" value="http://joysell.ir/callback.php">
                            <button class="btn btn-primary btn-block" type="submit">خرید</button>

                        </form>

                    <?php } else{ ?>

                        <a class="btn btn-block btn-primary" href=" #"  data-toggle="modal" data-target="#myModal">ورود / خرید</a>

                    <?php } ?>

                </div>




                <?php
            }
        }
        else
        {
            echo '<p class="text-center">آدرس شما نادرست است. لطفا بررسی کنید و دوباره امتحان کنید</p>';
        }
        ?>
    </div>
    <div class="row ">
        <div class="title">محصولات مرتبط</div>
        <div class=" col-xs-12">
            <div class="owl-carousel owl-theme">
                <?php
                /*$cat=unserialize($res2['product_cat']);
                $Scat=$res2['product_cat'];
                echo $Scat;



                $SQL_Part="(";
                $i=0;
                /*while ($i<sizeof($cat)-1)
                {
                    $SQL_Part+=$cat[i]+",";
                }
                $SQL_Part=$SQL_Part+$cat[$i+1]+")";

                $SQL="SELECT * FROM products WHERE catid IN "+$SQL_Part;
*/


                $select=select("select * from link_products WHERE user_id='$user_id'");
                $rec=fetch_result($select);
                foreach ($rec as $rec) {


                    ?>
                    <div class="item text-center">
                        <div>
                            <a href="<?php echo $rec['product_link'] ?>" title="<?php echo $rec['product_name']; ?>">
                                <img title="محصولات مرتبط" alt="محصولات مرتبط"
                                     class="img-responsive img-thumbnail" width="250" height="250" src="<?php $path='uploads/products/'.$user_id.'-'.$rec["product_id"].'.jpg'; if(file_exists($path)){ echo $path;}else{ echo 'uploads/products/default.jpg';} ?>">
                                <div class="caption">
                                    <p><?php echo $rec['product_name']; ?></p>
                                    <p><?php echo $rec['product_price'].' '; ?>تومان  </p>
                                </div>
                            </a>
                        </div>


                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>

</div>

<!----modals---->

<div class="modal fade" id="myModal" role="dialog" style="direction: rtl">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#login_tab">ورود</a></li>
                    <li><a data-toggle="tab" href="#signup_tab">عضویت</a></li>

                </ul>


            </div>

            <div class="modal-body">
                <div class="tab-content">
                    <div id="login_tab" class="tab-pane fade in active">
                        <p class="message_modal"><?php if(isset($_GET['message']) &&isset($_GET['type'])){ echo $_GET['message'];} ?></p>
                        <form role="form" action="operation.php" method="post" class="text-right">
                            <input type="hidden" class="form-control"   name="type" value='login_customer'>

                            <div class="form-group ">
                                <label for="username">آدرس پست الکترونیک</label>
                                <input type="email" class="form-control"  placeholder="پست الکترونیک" name="username">
                            </div>

                            <div class="form-group">
                                <label for="pwd">رمز عبور</label>
                                <input type="password" class="form-control" id="pwd" name="password">
                            </div>
                            <div class="checkbox">

                                <input type="hidden" name="check" value="sended">

                                <input type="checkbox" name="remember" value="true">
                                <label style="margin-right:20px">

                                    مرا به خاطر بسپار
                                </label>
                            </div>

                            <div class="forgot">
                                <a  data-toggle="modal" data-target="#forgot_password" href=""> رمز عبور خود را فراموش کردید</a>

                            </div>
                            <button type="submit" class="btn btn-primary  btn-block">ورود</button>
                        </form>
                    </div>
                    <div id="signup_tab" class="tab-pane fade">
                        <p> فرم زیر را تکمیل نمایید. وارد کردن تمام موارد ستاره دار (* ) الزامیست</p>

                        <form role="form" action="operation.php" method="post" class="text-right" enctype="multipart/form-data">

                            <input type="hidden" name="type" value="signUp_customer">
                            <div class="col-md-6 col-xs-12">
                                <label for="sign_fname">نام *</label>
                                <input type="text" class="form-control"  name="fname" required>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label for="sign_fname">نام خانوادگی*</label>
                                <input type="text" class="form-control" id="lname" name="lname" required>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label for="sign_fname">پست الکترونیک*</label>
                                <input type="email" class="form-control"  name="email" required>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label for="sign_fname">تلفن همراه*</label>
                                <input type="text"  id="mobile" class="form-control"  name="mobile" required>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label for="sign_fname">رمز عبور *</label>
                                <input type="password" class="form-control"  name="password"  required>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label for="sign_fname">تکرار رمز عبور *</label>
                                <input type="password" class="form-control"  name="repassword"  required>
                            </div>


                            <button type="submit" class="btn btn-primary  btn-block" name="submit" >ثبت </button>
                        </form>

                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">بستن</button>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="orders" role="dialog" style="direction: rtl">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <p>سفارشات شما</p>

            </div>
            <div class="modal-body">

                <?php
                $customer_id=$_SESSION['customer_id'];
                $select=select("SELECT * FROM link_orders WHERE customer_id='$customer_id' ");
                $result=fetch_result($select);
                $count3=$select->rowCount();
                if($count3>0){

                    ?>
                    <table class="table table-striped  text-center">
                        <tr>
                            <td>محصول</td>
                            <td>قیمت</td>
                            <td>تاریخ</td>
                            <td>شماره پیگیری</td>
                        </tr>
                        <?php foreach ($result as $result){ ?>
                            <td>
                                <?php
                                $product= $result['order_product'];
                                $selec=select("SELECT * FROM link_products WHERE product_id='$product' ");
                                $res=fetch_result($selec);
                                $count4=$select->rowCount();

                                foreach ($res as $res)
                                {
                                    echo $res['product_name'];
                                }

                                ?>

                            </td>
                            <td><?php echo $result['order_amount']/10; ?>تومان</td>
                            <td><?php echo $result['order_date'] ?></td>
                            <td><?php echo $result['order_timeId'] ?></td>



                        <?php   } ?>


                    </table>

                <?php } ?>

            </div>

        </div>

    </div>

</body>
</html>