<?php
//شروع یک نشست
//session_start();
$user_id=$_SESSION['id'];

connect();
$page='Admin_Customers';
?>
<?php  if(isset($_GET['message'])) {?><p class="show_message" id="message_fade"><?php echo $_GET['message'];} ?></p>
<table class="table table-responsive table-stripped " id="table">
    <thead>



    <th>نام مشتری</th>
    <th>شماره ملی</th>
    <th>پست الکترونیک</th>
    <th>موبایل</th>


    <th>عملیات</th>




    </thead>
    <tbody>
    <?php

    $select=select("SELECT * FROM  link_customers where user_id='$user_id'  ORDER BY customer_id DESC");
    $rec=fetch_result($select);
    foreach($rec as $rec) {
        ?>
        <tr>

            <td><?php echo $rec['customer_fname'].' '.$rec['customer_lname']; ?></td>
            <td><?php echo $rec['customer_ident'];?></td>
            <td><?php echo $rec['customer_email'];?></td>
            <td><?php echo $rec['customer_mobile'];?></td>
            <td>
                <div class="btn-group btn-group-xs">
                    <a href="?Page=edit_customer&&id=<?php echo $rec['customer_id']; ?>" class="btn btn-success"  >ویرایش</a>
                </div>

                <div class="btn-group btn-group-xs">

                    <a type="button" class="btn btn-danger" href="operation.php?type=del_customer&&id=<?php echo $rec['customer_id']; ?>"">حذف</a>

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