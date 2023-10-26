<?php include 'head.php'; ?>
<body>
<div class="row">
<?php include 'nav_part.php'; ?>
</div>
    <div class="container">
    <?php
    include 'DB.php';
    include 'jdf.php';
    connect();
    $id=$_GET['id'];
    $select= select("select * from link_plans WHERE plan_id=$id ");
    $rec=fetch_result($select);
    foreach ($rec as $rec)
    {

    ?>
    <div class="row plan_submit">
        <h3 class="text-center">فاکتور خرید طرح</h3>
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
        <table class="table table-striped">
            <tr>
                <td>نام کاربر : </td>
                <td> <?php echo $_SESSION['fullName'] ?></td>
            </tr>
                <tr>
                    <td>نوع طرح :  </td>
                    <td> <?php echo $rec['plan_name'] ?></td>
                </tr>

                <tr>
                    <td>تعداد محصول : </td>
                    <td> <?php echo $rec['plan_pnumber'] ?></td>
                </tr>
                <tr>
                    <td>ویژگی های دیگر : </td>
                    <td> لینک اختصاصی به ازای هر محصول، نمایش ویترین آنلاین</td>
                </tr>
            <tr>
                <td> تاریخ سفارش: </td>
                <td><?php echo jdate('H:i:s').' , '.jdate('Y-m-d'); ?></td>
            </tr>
                <tr>
                    <td>قیمت : </td>
                    <td> <?php echo $rec['plan_price'] ?>تومان </td>
                </tr>
                <tr>
                    <td>هزینه حمل و نقل : </td>
                    <td> 0  تومان</td>
                </tr>
                <hr>
                <tr>
                    <td>هزینه کل : </td>
                    <td><?php echo $rec['plan_price'] ?> تومان </td>
                </tr>


        </table>
        <form class="form-group text-center" action="payment.php" method="post">
            <input type="hidden" name="type" value="order_plan">
            <input type="hidden" name="price" value=" <?php echo $rec['plan_price']*10; ?>">
            <input type="hidden" name="callback" value="http://joysell.ir/callback.php">
            <input type="hidden" name="product_id" value="<?php echo 'plan_'.$_GET['id'];?>">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'];?>">

            <input type="submit" name="submit" value="خرید" class=" btn btn-primary">

        </form>
        </div>
        <div class="col-sm-2"></div>
    </div>
<?php } ?>
    </div>


      <?php include "footer.php"?>
</body>
</html>