    <form role="form" action="operation.php" method="post" class="text-right" enctype="multipart/form-data">
    <h4>مشاهده نظرات</h4>
    <?php
    $id=$_GET['id'];
    $select=select("select * from link_plans WHERE plan_id='$id' ");

    $results=fetch_result($select);
    foreach ($results as $results)
    {
    ?>
        <input type="hidden" name="type" value="edit_plan">
        <input type="hidden" name="id" value="<?php echo $results['plan_id'];?>">
        <div class="col-md-6 col-xs-12 ">
            <label for="sign_fname">نام طرح</label>
            <input type="text" class="form-control" name="name" value="<?php echo $results['plan_name'];?>" required>
        </div>
        <div class="col-md-6 col-xs-12 ">
            <label for="sign_fname">تعداد محصول </label>
            <input type="number" class="form-control"  name="pnumber" value="<?php echo $results['plan_pnumber'];?>"  required>
        </div>
        <div class="col-md-6 col-xs-12 ">
            <label for="sign_lname">قیمت</label>
            <input class="form-control"  name="price"    required value="<?php echo $results['plan_price'];?>">
        </div>

   <br>
        <button type="submit" class="btn btn_send btn-block" name="submit" >ثبت</button>
        <?php }?>
    </form>
</div>