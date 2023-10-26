
<?php
$id=$_SESSION['id'];
$cp;
$select1=select("select * from link_orderplan WHERE user_id='$id'");
$rec=fetch_result($select1);
foreach($rec as $rec) {

    if($rec['plan_id']==1)
    {
        $cp+=50;
    }else if($rec['plan_id']==2)
    {
        $cp+=100;
    }
    else if($rec['plan_id']==3)
    {
        $cp+=200;
    }
}

$select2=select("select * from link_products WHERE user_id='$id'");
$count=$select2->rowCount();

if($cp>=$count){
    echo 'تعداد محصولات مجاز جهت افزودن :'.($cp-$count);
?>
<form role="form" action="operation.php" method="post" class="text-right" enctype="multipart/form-data">

    <h4> افزودن محصول</h4>
    <p>تعداد محصول باقی مانده <?php echo $cp-$count; ?></p>



    <input type="hidden" name="type" value="add_product">

    <div class="col-md-6 col-xs-12 ">
        <label for="sign_fname">نام محصول  *</label>
        <input type="text" class="form-control" id="sign_fname" name="name"  required>
    </div>
    <div class="col-md-6 col-xs-12 ">
        <label for="sign_lname">قیمت - تومان*</label>
        <input type="text" class="form-control" id="sign_lname" name="price"  required >
    </div>
    <div class="col-md-6 col-xs-12 ">
        <label for="sign_code">تعداد محصول *</label>
        <input type="number" class="form-control"  name="number"  required>
    </div>

    <div class="col-md-6 col-xs-12">
        <label for="sign_pass">توضیح محصول *</label>
        <textarea  class="form-control" id="sign_pass" name="description"></textarea>
    </div>
    <div class="col-md-6 col-xs-12 ">
        <label for="sign_code">کلمات کلیدی *</label>
        <input type="text" class="form-control"  name="keywords"  required>
        <p>حداکثر 10 کلمه بنویسید و بین هرکدام از ,  استفاده کنید</p>
    </div>
    <div class="col-md-6 col-xs-12 ">
        <label for="sign_code" >دسته بندی *</label>
        <br>
        <select multiple="multiple" name="cat[]" id="multi_select"  class="form-control" >

            <?php
            $id=$_SESSION['id'];
            $select=select("select * from link_category WHERE user_id='$id' ORDER BY cat_id DESC");
            $category=fetch_result($select);
            foreach($category as $cat) {
                ?>

                <option value="<?php echo $cat['cat_id']; ?>"><?php echo $cat['cat_name'] ?></option>
                <?php
            }
            ?>
        </select>


    </div>


    <div class="col-md-6 col-xs-12 ">
        <div class="avatar-upload">
            <div class="avatar-edit">
                <input type='file' id="imageUpload" accept=".jpg, .jpeg"  name="file" />
                <label for="imageUpload"></label>
            </div>
            <div class="avatar-preview">
                <div id="imagePreview" style="background-image: url('uploads/products/product.jpg');">
                </div>
            </div>
        </div>

    </div>
    <div class="col-xs-12 ">
        <button type="submit" class="btn btn_send btn-block" name="submit" >افزودن</button>
    </div>
</form>
<?php }else { echo 'تعداد محصولات مجاز شما به پایان رسیده است . لطفا طرح جدیدی خریداری نمایید';} ?>