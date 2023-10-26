<?php
//شروع یک نشست
//session_start();
connect();
$page='Admin_News';
?>
<?php  if(isset($_GET['message'])) {?><p class="show_message" id="message_fade"><?php echo $_GET['message'];} ?></p>
<table class="table table-responsive table-stripped " id="table">

    <thead>
    <th>کاربر </th>
    <th>مقدار</th>
    <th>وضعیت</th>
    <th>توضیحات</th>
    <th>تاریخ</th>

    <th>عملیات</th>


    </thead>
    <tbody>
    <?php

    $select=select("SELECT * FROM  link_payment");
    $rec=fetch_result($select);
    foreach($rec as $rec) {
        ?>
        <tr>
            <td><?php
                $user=$rec['user_id'];
                $select1=select("SELECT * FROM  link_users WHERE user_id='$user'");
                $rec1=fetch_result($select1);
                foreach($rec1 as $rec1) {
                echo $rec1['user_fname'].' '.$rec1['user_lname'];}
                ?></td>
            <td><?php echo $rec['payment_amount']?></td>
            <td><?php echo $rec['payment_status']?></td>
            <td><?php echo $rec['payment_description']?></td>
            <td><?php echo $rec['payment_date']?></td>
            <td>
                <div class="btn-group btn-group-xs">
                    <a href="?Page=Edit_Payment&&id=<?php echo $rec['payment_id']; ?>" class="btn btn-success"  >مشاهده/ پرداخت</a>
                </div>
            </td>


        </tr>


        <?php
    }
    ?>
    </tbody>
</table>
</body>
</html>