    <form role="form" action="operation.php" method="post" class="text-right" enctype="multipart/form-data">
        <h4>ویرایش محصول</h4>
    <?php
       $id=$_GET['id'];
    $select=select("select * from link_products WHERE product_id='$id' ");

    $user=fetch_result($select);
    foreach($user as $user)
    {
    ?>
        <input type="hidden" name="type" value="edit_product">
        <input type="hidden" name="id" value="<?php echo $user['product_id'];?>">
        <div class="col-md-6 col-xs-12 ">
            <label for="sign_fname">نام محصول  *</label>
            <input type="text" class="form-control" id="sign_fname" name="name" value="<?php echo $user['product_name'];?>" required>
        </div>
        <div class="col-md-6 col-xs-12 ">
            <label for="sign_lname"> قیمت *</label>
            <input type="text" class="form-control" id="sign_lname" name="price" value="<?php echo $user['product_price'];?>" required >
        </div>
        <div class="col-md-6 col-xs-12 ">
            <label for="sign_code">تعداد محصول *</label>
            <input type="number" class="form-control"  name="number" value="<?php echo $user['product_number'];?>" required>
        </div>

        <div class="col-md-6 col-xs-12">
            <label for="sign_pass">توضیح محصول *</label>
            <textarea  class="form-control" id="sign_pass" name="description"><?php echo $user['product_description'];?></textarea>
        </div>


            <div class="col-md-6 col-xs-12 ">
                <label for="sign_code">دسته بندی *</label>
                <select multiple="multiple" name="cat[]" id="multi_select">

                    <?php
                    $id=$_SESSION['id'];
                    $cat=$user['product_cat'];
                    $cat_selected=unserialize($cat);
                    echo $cat;

                    $select=select("select * from link_category WHERE user_id='$id' ");
                    $category=fetch_result($select);
                    foreach($category as $cat) {
                        $name=$cat['cat_name'];
                        ?>

                        <option  value="<?php echo $cat['cat_id'] ?> " <?php  if (!empty($cat_selected)){if(array_search($name,$cat_selected) >-1){ echo 'selected';}} ?>  ><?php echo $cat['cat_name'] ?></option>
                        <?php
                    }
                    ?>
                </select>

        </div>

        <div class="col-md-6 col-xs-12">
            <label for="sign_pass">لینک کوتاه محصول- فقط قابل خواندن </label>
            <textarea  class="form-control" readonly  id="sign_pass" name="short_link"><?php $url=urldecode($user['product_link']);  $url1=str_replace("%3F","?","$url"); echo $url1;?></textarea>
            <p>از این لینک برای فروش این محصول میتوانید استفاده کنید</p>
        </div>




<?php } ?>

        <button type="submit" class="btn btn_send btn-block" name="submit" >ویرایش</button>
    </form>
</div>