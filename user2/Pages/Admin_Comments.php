<?php
//شروع یک نشست
//session_start();
connect();
$page='Admin_News';
?>
<?php  if(isset($_GET['message'])) {?><p class="show_message" id="message_fade"><?php echo $_GET['message'];} ?></p>
<table class="table table-responsive table-stripped " id="table">

    <thead>
    <th>نام نویسنده </th>
    <th>ادرس ایمیل</th>
    <th>موضوع</th>
    <th>متن</th>

    <th>عملیات</th>
    <th>عملیات</th>

    </thead>
    <tbody>
    <?php

    $select=select("SELECT * FROM  link_comment  ORDER BY comment_id DESC");
    $rec=fetch_result($select);
    foreach($rec as $rec) {
        ?>
        <tr>
            <td><?php echo $rec['comment_fullName'];?></td>
            <td><?php echo $rec['comment_email']?></td>
            <td><?php echo $rec['comment_subject']?></td>
            <td><?php echo $rec['comment_text']?></td>
            <td>
                <div class="btn-group btn-group-xs">
                    <a href="?Page=Edit_Comment&&id=<?php echo $rec['comment_id']; ?>" class="btn btn-success"  >مشاهده</a>
                </div>
            </td>
            <td>
                <div class="btn-group btn-group-xs">
                    <a type="button" class="btn btn-danger" href="operation.php?type=del_comment&&id=<?php echo $rec['comment_id']; ?>"">حذف</a>
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