    <form role="form" action="operation.php" method="post" class="text-right" enctype="multipart/form-data">
        <h4>ویرایش دسته بندی</h4>
    <?php
       $id=$_GET['id'];
    $select=select("select * from link_category WHERE cat_id='$id' ");

    $row=fetch_result($select);
    foreach($row as $row)
    {
    ?>
        <input type="hidden" name="type" value="edit_category">
        <input type="hidden" name="id" value="<?php echo $row['cat_id'];?>">
        <div class="col-md-6 col-xs-12 ">
            <label for="sign_fname">نام دسته بندی *</label>
            <input type="text" class="form-control" id="sign_fname" name="name" value="<?php echo $row['cat_name'];?>" required>
        </div>

<?php } ?>
        <div class=" col-xs-12 ">
        <button type="submit" class="btn btn_send btn-block" name="submit" >ویرایش</button>
        </div>
    </form>
</div>