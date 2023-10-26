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



    <th>نام محصول</th>
    <th>قیمت محصول</th>
    <th>تعداد محصول</th>


    <th>عملیات</th>
    <th>عملیات</th>



    </thead>
    <tbody>
    <?php

    $select=select("SELECT * FROM  link_products where user_id='$user_id' ORDER BY product_id DESC");
    $rec=fetch_result($select);
    foreach($rec as $rec) {
        ?>
        <tr>

            <td><?php echo $rec['product_name']?></td>
            <td><?php echo $rec['product_price'];?></td>
            <td><?php echo $rec['product_number'];?></td>
            <td>
                <div class="btn-group btn-group-xs">
                    <a href="?Page=Edit_Product&&id=<?php echo $rec['product_id']; ?>" class="btn btn-success"  >ویرایش</a>
                </div>
            </td>
            <td>
                <div class="btn-group btn-group-xs">

                    <a type="button" class="btn btn-danger" href="operation.php?type=del_product&&id=<?php echo $rec['product_id']; ?>"">حذف</a>

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