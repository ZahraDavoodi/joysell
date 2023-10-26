<?php
//شروع یک نشست
//session_start();
$user_id=$_SESSION['id'];

connect();
$page='Admin_Products';
?>
<?php  if(isset($_GET['message'])) {?><p class="show_message" id="message_fade"><?php echo $_GET['message'];} ?></p>
<table class="table table-responsive table-stripped " id="table">
    <thead>


    <th>شماره مشتری</th>
    <th>تاریخ سفارش </th>
    <th>محصول</th>
    <th>مبلغ سفارش</th>

    <th>وضعیت</th>


    </thead>
    <tbody>
    <?php

    $select=select("SELECT * FROM  link_orders where user_id='$user_id'  ORDER BY order_id DESC");
    $rec=fetch_result($select);
    foreach($rec as $rec) {
        ?>
        <tr>

            <td><?php $cmId=$rec['customer_id'];
                $select1=select("SELECT * FROM link_customers WHERE customer_id='$cmId'");
                $res1=fetch_result($select1);
                foreach ($res1 as $res1){
                    echo $res1['product_name'];
                }

                ?></td>
            <td><?php echo $rec['order_date']?></td>
            <td><?php
                $PID=$rec['order_product'];
                $select2=select("SELECT * FROM link_products WHERE product_id='$PID'");
                $res2=fetch_result($select2);
                foreach ($res2 as $res2){
                    echo $res2['product_name'];
            } ?></td>
            <td><?php echo $rec['order_amount'];?></td>
            <td><?php echo $rec['order_state'];?></td>
            <td>


        </tr>


        <?php
    }
    ?>
    </tbody>
</table>
</body>
</html>