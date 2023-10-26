    <form role="form" action="operation.php" method="post" class="text-right" enctype="multipart/form-data">
        <h4> افزودن محصول</h4>

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
            <label for="sign_code">دسته بندی *</label>
            <select multiple="multiple" name="cat[]" id="multi_select">

               <?php
               $id=$_SESSION['id'];
               $select=select("select * from link_category WHERE user_id='$id' ORDER BY cat_id DESC;
 ");
               $category=fetch_result($select);
               foreach($category as $cat) {
               ?>

                   <option <?php echo $cat['cat_id']; ?> ><?php echo $cat['cat_name'] ?></option>
                   <?php
               }
               ?>
            </select>


        </div>


        <div class="col-md-6 col-xs-12 ">
            <label for="sign_code">تصویر محصول</label>
            <input type="file" name="file" class="form-control">

        </div>






        <button type="submit" class="btn btn_send btn-block" name="submit" >افزودن</button>
    </form>
