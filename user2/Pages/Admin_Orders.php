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
    <th>محصولات سفارش</th>
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

            <td><?php echo $rec['customer_id']?></td>
            <td><?php echo $rec['order_date']?></td>
            <td><?php echo $rec['order_product']?></td>
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