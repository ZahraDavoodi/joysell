<?php
//شروع یک نشست
//session_start();
connect();
$page='Admin_Trans';
?>
<?php  if(isset($_GET['message'])) {?><p class="show_message" id="message_fade"><?php echo $_GET['message'];} ?></p>
<table class="table table-responsive table-stripped " id="table">
    <thead>
    <th>کاربر </th>
    <th>محصول</th>
    <th>قیمت (تومان)</th>
    <th>تاریخ</th>

    <th>زمان</th>
    <th>وضعیت</th>


    </thead>
    <tbody>
    <?php

    $select=select("SELECT * FROM  link_trans");
    $rec=fetch_result($select);

    foreach($rec as $rec) {
        ?>
        <tr>
            <td><?php
                $user_id=$rec['user_id'];
                $select1=select("SELECT * FROM  link_users WHERE user_id =' $user_id'");
                $rec1=fetch_result($select1);
                foreach ($rec1 as $rec1){echo $rec1['user_fname'].' '.$rec1['user_lname'];}
              ?></td>
            <td><?php
                if($rec['order_type']=='product'){
                $product_id=$rec['product_id'];
                $select2=select("SELECT * FROM  link_products WHERE product_id =' $product_id'");
                $rec2=fetch_result($select2);
                foreach ($rec2 as $rec2){echo 'محصول '.$rec2['product_name'];}
                }elseif($rec['order_type']=='plan'){
                    $product_id=$rec['product_id'];
                    $select3=select("SELECT * FROM  link_plans WHERE plan_id =' $product_id'");
                    $rec3=fetch_result($select3);
                    foreach ($rec3 as $rec3){echo 'طرح '.$rec3['plan_name'];}
                }
                ?></td>
            <td><?php echo $rec['trans_amount']/10;?></td>
            <td><?php echo $rec['trans_date'];?></td>
            <td><?php $time=str_split($rec['trans_time'],2); echo $time[0].':'.$time[1].':'.$time[2];?></td>
            <td><?php echo $rec['trans_status'];?></td>




        </tr>


        <?php
    }
    ?>
    </tbody>
</table>
