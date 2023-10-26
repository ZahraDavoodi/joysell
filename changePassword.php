<?php include 'head.php'; ?>
<body>
<div class="row">
    <?php include 'nav_part.php'; ?>
</div>
<div class="container">
    <?php
    include 'DB.php';
    include 'jdf.php';
    connect();
    $key=$_GET['key'];
    $user_id=$_GET['d'];
    $select= select("select * from link_users WHERE user_recovery='$key' and user_id='$user_id' ");
    $rec=fetch_result($select);
    $count=$select->rowCount();
    if($count==1)
    {
    foreach ($rec as $rec)
    {

        ?>
        <div class="row plan_submit">

            <div class="col-sm-2"></div>
            <div class="col-sm-8">

                <form class="form-group text-center" action="operation.php" method="post">
                    <fieldset>
                        <legend>تغییر رمز عبور</legend>

                    <input type="hidden" name="type" value="change_password">
                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                        <input type="hidden" name="key" value="<?php echo $key; ?>">

                        <input type="password" name="new_password" placeholder="رمز عبور جدید" class="form-control">
                        <input type="password" name="renew_password" placeholder="تکرار رمز عبور جدید" class="form-control">
                        <input type="submit" class="btn btn-block btn-block" name="submit" value="ثبت"  >

                    </fieldset>
                </form>
            </div>
            <div class="col-sm-2"></div>
        </div>
    <?php } }else{?>
    <div class="row plan_submit">

        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <p>کاربر گرامی، لینک وارد شده نادرست است. لطفا برای تغییر رمز عبور مجددا درخواست ارسال ایمیل را بدهید.</p>
        </div>
        <div class="col-sm-2"></div>
    <?php }?>
</div>


<?php include "footer.php"?>
</body>
</html>