<?php
//شروع یک نشست
//session_start();
connect();
$page='Admin_Plans';
?>
<?php  if(isset($_GET['message'])) {?><p class="show_message" id="message_fade"><?php echo $_GET['message'];} ?></p>
<table class="table table-responsive table-stripped " id="table">

    <thead>
    <th>نام طرح </th>
    <th>تعداد محصول</th>
    <th>قیمت محصول</th>
    <th>عملیات</th>
    <th>عملیات</th>


    </thead>
    <tbody>
    <?php

    $select=select("SELECT * FROM  link_plans");
    $rec=fetch_result($select);
    foreach($rec as $rec) {
        ?>
        <tr>
            <td><?php echo $rec['plan_name'];?></td>
            <td><?php echo $rec['plan_pnumber']?></td>
            <td><?php echo $rec['plan_price']?></td>

            <td>
                <div class="btn-group btn-group-xs">
                    <a href="?Page=Edit_Plan&&id=<?php echo $rec['plan_id']; ?>" class="btn btn-success"  >ویرایش</a>
                </div>
            </td>
            <td>
                <div class="btn-group btn-group-xs">
                    <a type="button" class="btn btn-danger" href="operation.php?type=del_plan&&id=<?php echo $rec['plan_id']; ?>"">حذف</a>
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