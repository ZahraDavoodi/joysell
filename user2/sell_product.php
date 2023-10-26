<!DOCTYPE html>

<?php
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
<body>

<div class="container-fluid head_sell">
    <ul>
        <li><a href="../index.php">جویسل</a></li>
        <li><a href="products.php?id=<?php echo $user_id; ?>">نمایش  همه محصولات</a></li>

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
        echo 'آدرس شما نادرست است. لطفا بررسی کنید و دوباره امتحان کنید';
    }

    ?>
     </span>


</div>

<div class="container">


    <div class="row sell_product">

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
                <button class="btn btn-primary btn-block"><i class="fa fa-shopping-cart"></i>خرید</button>
            </div>
                <div class="col-sm-6 col-xs-12 text-center">
                    <img  src="uploads/products/<?php echo $user_id.'-'.$product_id.'.jpg'; ?>" class="img-responsive img-thumbnail">
                </div>

            <?php
            }
        }
        else
        {
            echo'محصول موجود نیست، url را چک کنید ';
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
                            <a href="#">
                                <img title="محصولات مرتبط" alt="محصولات مرتبط"
                                     class="img-responsive img-thumbnail" width="250" height="250" src="<?php $path='uploads/products/'.$user_id.'-'.$rec["product_id"].'.jpg'; if(file_exists($path)){ echo $path;}else{ echo 'uploads/products/product.jpg';} ?>">
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



</body>
</html>