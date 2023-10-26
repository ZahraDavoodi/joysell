<?php session_start();
include '../DB.php';
connect();
$id=$_SESSION['id'];
if(isset($_GET['id'])){
    $id=$_GET['id'];
}
$select=select("select * from link_storeinfo where user_id='$id'");
$results1=fetch_result($select);
foreach ($results1 as $result1)
{

?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="image/x-icon" href="../images/Icon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $result1['store_description']; ?>">
    <meta name="author" content="davoodi">

    <title><?php echo $result1['store_name']; ?></title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->

    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/bootstrap-3.2.rtl.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="../css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/creative2.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">

     <script src="../js/jquery.js" type="text/javascript"></script>

    <script >
        $(document).ready(function () {
            setTimeout(function message_fade(){$("#message_fade").fadeOut();},1000);

        })

    </script>


</head>
<body style="    margin-top: -50px;">
<?php  if(isset($_GET['message'])) {?><p class="show_message" id="message_fade"><?php echo $_GET['message'];} ?></p>
<?php
  $path = "uploads/stores/".$result1['user_id'] ."_baner.jpg";
?>
<section class="container-fluid" id="header" style="<?php if (file_exists($path)){ ?>background-image:url(<?php echo $path?> );<?php }else{?>background-image:url('uploads/stores/baner.jpg'); <?php } ?>">
     <div class="row text-center">
         <span><?php echo $result1['store_name']; ?></span>
     </div>
</section>
<?php }?>
<div class="container" >

    <div class="row text-center" id="products" >
    <?php

$per_page =9;
if(isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$start = $per_page * $page;
$start = $start - $per_page;


    $select=select("select * from link_products where user_id='$id' LIMIT $start , $per_page");

    $results=fetch_result($select);
    foreach ($results as $result)
    { $link='L'.$result["user_id"].'L'.$result["product_id"];
    ?>
        <div class="col-sm-4">
            <a href="sell_product.php?link=<?php echo $link; ?>" title="جزییات محصول " target="_blank">
            <div class="item">

                <img src="<?php $path='uploads/products/'.$result['user_id'].'-'.$result['product_id'].'.jpg' ; if(file_exists($path) ) {echo $path;} else{ echo 'uploads/products/default.jpg';}?>" alt="تصویر محصول" class="img-rounded img-thumbnail">
                <h4><?php echo $result['product_name'] ; ?></h4>
                <span class="text-left"><?php echo $result['product_price'] ?> تومان</span>
                <button class="btn  btn-primary text-right"><a href="sell_product.php?link=<?php echo $link; ?>"><i class="fa fa-shopping-cart fa-2x"></i> </a> </button>
            </div>
            </a>
        </div>
    <?php
    }

    ?>
    </div>

    <div class="row text-center product_nav">

        <?php
        $total_page=0;
        $select2=select("select COUNT(*) as total from link_products where user_id='$id' LIMIT $start , $per_page");
        $results2=fetch_result($select2);
        foreach ($results2 as $results2)
        {
        $total_page = (ceil( $results2['total'] / $per_page));
        }
        $prev = $page-1;
        if($page <=1) {
            echo "
                <td> < قبلی </td>
            ";
        }else {
            echo "
                <td><a href=\"?page=".$prev."\"> <قبلی </a></td>
            ";
        }

        for($i=1;$i<=$total_page;$i++){

            if($i==$page) {
                echo "
                    <td class='active'>$i</td>
                ";
            }
            else {
                echo "
                    <td><a href=\"?page=".$i."\">".$i."</a></td>
                ";
            }
        }
        $next = $page+1;
        if($page>=$total_page) {
            echo "
                 <td>بعدی ></td>
            ";
        } else {
            echo "
                 <td><a href=\"?page=$next\">بعدی ></a></td>
            ";
        }
        ?>


    </div>

</div>

</body>
</html>