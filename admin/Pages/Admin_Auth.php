<?php
//شروع یک نشست
//session_start();
connect();
$page='Admin_News';
?>
<?php  if(isset($_GET['message'])) {?><p class="show_message" id="message_fade"><?php echo $_GET['message'];} ?></p>
<table class="table table-responsive table-stripped " id="table">

    <thead>
    <th>نام  </th>
    <th>تصویر</th>
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
            <td><img src=""><img src="../../user/uploads/nationalCard/<?php echo $rec['user_id'] ?>.jpg"</td>
            <td>
                <div class="btn-group btn-group-xs">
                    <a href="operation.php?type=ok_user&&id=<?php echo $rec['user_id']; ?>" class="btn btn-success"  >تایید</a>
                </div>

                <div class="btn-group btn-group-xs">
                    <a type="button" class="btn btn-danger" href="operation.php?type=notOk_user&&id=<?php echo $rec['user_id']; ?>" >رد</a>
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