    <form role="form" action="operation.php" method="post" class="text-right" enctype="multipart/form-data">
        <h4>ویرایش مشتری</h4>
    <?php
       $id=$_GET['id'];
    $select=select("select * from link_customers WHERE customer_id='$id' ");

    $user=fetch_result($select);
    foreach($user as $user)
    {
    ?>
        <input type="hidden" name="type" value="edit_customer">
        <input type="hidden" name="id" value="<?php echo $user['customer_id'];?>">
        <div class="col-md-6 col-xs-12 ">
            <label for="sign_fname">نام مشتری  *</label>
            <input type="text" class="form-control" id="sign_fname" name="fname" value="<?php echo $user['customer_fname'];?>" required>
        </div>
        <div class="col-md-6 col-xs-12 ">
            <label for="sign_fname">نام خانوادگی  *</label>
            <input type="text" class="form-control" id="sign_fname" name="lname" value="<?php echo $user['customer_lname'];?>" required>
        </div>
        <div class="col-md-6 col-xs-12 ">
            <label for="sign_lname"> آدرس پست الکترونیک*</label>
            <input type="text" class="form-control" id="sign_lname" name="email" value="<?php echo $user['customer_email'];?>" required >
        </div>
        <div class="col-md-6 col-xs-12 ">
            <label for="sign_code">شماره موبایل *</label>
            <input type="number" class="form-control"  name="mobile" value="<?php echo $user['customer_mobile'];?>" required>
        </div>




<?php } ?>
        <div class=" col-xs-12 ">
        <button type="submit" class="btn btn_send btn-block" name="submit" >ویرایش</button>
        </div>
    </form>
</div>