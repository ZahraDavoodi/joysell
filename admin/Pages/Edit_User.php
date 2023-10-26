    <form role="form" action="operation.php" method="post" class="text-right" enctype="multipart/form-data">
        <h4>ویرایش کاربر</h4>
    <?php
       $user_id=$_GET['id'];
    $select=select("select * from link_users WHERE user_id='$user_id' ");

    $user=fetch_result($select);
    foreach ($user as$user){


    ?>
        <input type="hidden" name="type" value="edit_user">
        <input type="hidden" name="id" value="<?php echo $user['user_id'];?>">
        <div class="col-md-6 col-xs-12 ">
            <label for="sign_fname">نام  *</label>
            <input type="text" class="form-control" id="sign_fname" name="fname" value="<?php echo $user['user_fname'];?>" required>
        </div>
        <div class="col-md-6 col-xs-12 ">
            <label for="sign_lname">نام خانوادگی *</label>
            <input type="text" class="form-control" id="sign_lname" name="lname" value="<?php echo $user['user_lname'];?>" required >
        </div>
        <div class="col-md-6 col-xs-12 ">
            <label for="sign_code">کدملی *</label>
            <input type="text" class="form-control" id="username" name="ident" value="<?php echo $user['user_ident'];?>" required>
        </div>

        <div class="col-md-6 col-xs-12">
            <label for="sign_pass">رمز عبور *</label>
            <input type="password" class="form-control" id="sign_pass" name="password" value="<?php echo $user['user_pass'];?>" required>
        </div>

        <div class="col-md-6 col-xs-12">
            <label for="sign_rpass">آدرس ایمیل</label>
            <input type="email" class="form-control" id="sign_rpass" name="email" value="<?php echo $user['user_email'];?>" required>
        </div>
        <div class="col-md-6 col-xs-12">
            <label for="sign_rpass">شماره همراه *</label>
            <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $user['user_mobile'];?>" required>
        </div>
        <div class="col-md-6 col-xs-12">
            <label for="sign_rpass">شماره تلفن *</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $user['user_phone'];?>" required>
        </div>
        <div class="col-md-6 col-xs-12">
            <label for="sign_rpass">تاریخ عضویت</label>
            <input type="text" class="form-control" id="user_birth"  required name="signUpDate" value="<?php echo $user['user_signUpDate'];?>">
        </div>
        <div class="col-md-6 col-xs-12">
            <label for="sign_rpass">شماره حساب</label>
            <input type="text" class="form-control" id="user_accNum"  required name="accNum" value="<?php echo $user['user_accNum'];?>">
        </div>
        <div class="col-md-6 col-xs-12">
            <label for="sign_rpass">شماره شبا</label>
            <input type="text" class="form-control" id="user_sheba"  required name="sheba" value="<?php echo $user['user_sheba'];?>">
        </div>
        <div class="col-md-6 col-xs-12">
            <label for="sign_rpass">بانک</label>
            <input type="text" class="form-control" id="user_bankName"  required name="bankName" value="<?php echo $user['user_bankName'];?>">
        </div>



        <button type="submit" class="btn btn_send btn-block" name="submit" >ویرایش</button>

        <?php }?>
    </form>
</div>