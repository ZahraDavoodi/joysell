<?php
//شروع یک نشست
//session_start();
$user_id=$_SESSION['id'];
connect();
$page='Admin_plans';
$select2=select("SELECT * FROM  link_products where user_id='$user_id'");
$count=$select2->rowCount();

?>

<div class="row text-center pnumber1">
    <a href="../index.php#plans">خرید طرح</a>
</div>
<div class="row">
<?php  if(isset($_GET['message'])) {?><p class="show_message" id="message_fade"><?php echo $_GET['message'];} ?></p>
<table class="table table-responsive table-stripped " id="table">

    <thead>
    <th>نام طرح </th>
    <th>تعداد محصول</th>
    <th>قیمت</th>

    <th>تاریخ</th>


    </thead>
    <tbody>
    <?php

    $select=select("SELECT * FROM  link_orderplan where user_id='$user_id' && order_state='1'");
    $rec=fetch_result($select);
    foreach($rec as $rec) {
        $plan_id=$rec['plan_id'];
        $select1=select("SELECT * FROM  link_plans where plan_id='$plan_id' ORDER BY plan_id DESC");
        $rec1=fetch_result($select1);

         foreach($rec1 as $rec1) {

        ?>
        <tr>
            <td><?php echo $rec1['plan_name'];?></td>
            <td><?php echo $rec1['plan_pnumber'];?></td>
            <td><?php echo $rec1['plan_price']?></td>

            <td><?php echo $rec['order_date']?></td>

        </tr>
        <?php
    }

    }

    ?>
    </tbody>
</table>
</div>

</body>
</html>