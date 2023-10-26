    <form role="form" action="operation.php" method="post" class="text-right" enctype="multipart/form-data">
    <h4>واریزی</h4>
    <?php
    $id=$_GET['id'];
    $select=select("select * from link_payment WHERE payment_id='$id' ");

    $results=fetch_result($select);
    foreach ($results as $results)
    {
    ?>
        <input type="hidden" name="type" value="edit_payment">
        <input type="hidden" name="id" value="<?php echo $results['payment_id'];?>">
        <div class="col-md-6 col-xs-12 ">
            <label for="sign_fname"> شماره کاربر</label>
            <input type="text" class="form-control" name="name" value="<?php echo $results['user_id'];?>" readonly required>
        </div>
        <div class="col-md-6 col-xs-12 ">
            <label for="sign_fname">مقدار</label>
            <input type="email" class="form-control"  name="amount" value="<?php echo $results['payment_amount'];?>" readonly  required>
        </div>
        <div class="col-md-6 col-xs-12 ">
            <label for="sign_lname">وضعیت</label>
            <input class="form-control"  name="status"  readonly  required value="<?php echo $results['payment_status'];?>">
        </div>
        <div class="col-md-6 col-xs-12 ">
            <label for="sign_lname">متن*</label>
            <textarea class="form-control"  name="description"  readonly required><?php echo $results['payment_description'];?></textarea>
        </div>
        <div class="col-md-6 col-xs-12 ">
            <label for="sign_lname">تاریخ درخواست*</label>
            <input class="form-control"  id="date_comment" name="payment_date"  value="<?php echo $results['payment_date'];?>" required readonly >
        </div>
        <div class="col-md-6 col-xs-12 ">
            <label for="sign_lname">تاریخ واریز*</label>
            <input class="form-control"  id="date_comment" name="payment_sendDate"  value="<?php echo $results['payment_sendDate'];?>" required readonly >
        </div>
   <br>
        <button type="submit" class="btn btn_send btn-block" name="submit" >پرداخت </button>
        <?php }?>
    </form>
</div>