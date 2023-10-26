<?php
//شروع یک نشست
//session_start();
connect();
$page='Admin_Users';
?>
<?php  if(isset($_GET['message'])) {?><p class="show_message" id="message_fade"><?php echo $_GET['message'];} ?></p>
<table class="table table-responsive table-stripped " id="table">
    <thead>
    <th>نام </th>
    <th>کد ملی</th>
    <th>فروشگاه</th>
    <th>بانک</th>

    <th>تلفن</th>
    <th>موبایل</th>
    <th>تاریخ عضویت</th>

    <th>عملیات</th>
    <th>عملیات</th>

    </thead>
    <tbody>
    <?php

    $select=select("SELECT * FROM  link_users");
    $rec=fetch_result($select);

    foreach($rec as $rec) {
        ?>
        <tr>
            <td><?php echo $rec['user_fname'].' '.$rec['user_lname'];?></td>
            <td><?php echo $rec['user_ident']?></td>
            <td><?php echo $rec['user_companyName'];?></td>
            <td><?php echo $rec['user_bankName'];?></td>

            <td><?php echo $rec['user_phone'];?></td>
            <td><?php echo $rec['user_mobile'];?></td>
            <td><?php echo $rec['user_signUpDate'];?></td>


            <td>
                <div class="btn-group btn-group-xs">
                    <a href="?Page=Edit_User&&id=<?php echo $rec['user_id']; ?>" class="btn btn-success"  >ویرایش</a>

                </div>
            </td>
            <td>
                <div class="btn-group btn-group-xs">

                    <a type="button" class="btn btn-danger" href="operation.php?type=del_user&&id=<?php echo $rec['user_id']; ?>"">حذف</a>

                </div>
            </td>

        </tr>


        <?php
    }
    ?>
    </tbody>
</table>
