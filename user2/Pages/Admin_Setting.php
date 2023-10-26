<?php
//شروع یک نشست
//session_start();
$user_id=$_SESSION['id'];
connect();
$page='Admin_Customers';
?>
<?php  if(isset($_GET['message'])) {?><p class="show_message" id="message_fade"><?php echo $_GET['message'];} ?></p>
<br/>

<form action="operation.php" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>اطلاعات ویترین</legend>
    <input type="hidden" name="type" value="setting">
<?php
$select= select("select * from link_storeinfo WHERE user_id='$user_id'");
$rec=fetch_result($select);
$count=$select->rowCount();
echo $count;
if($count==1){
foreach ($rec as $rec){
?>
   نام ویترین :
    <input type="text" placeholder="نام ویترین" name="name" class="form-control" value="<?php echo $rec['store_name']; ?>">
   توضیح کوتاه کسب وکار :
    <textarea placeholder="توضیح ویترین" class="form-control" name="description"><?php echo $rec['store_name']; ?></textarea>

 تصویر بنر :
    <input type="file" placeholder="نام ویترین" class="form-control" name="file" value="<?php echo $user_id.'_baner.jpg' ?>">
    <input type="submit" class="btn btn_send btn-block" name="submit" value="ثبت" >
<?php }} else{?>

    نام ویترین :
    <input type="text" placeholder="نام ویترین" class="form-control" value="" name="name">
    توضیح کوتاه کسب وکار :
    <textarea placeholder="توضیح ویترین" class="form-control" name="description"></textarea>

    تصویر بنر :
    <input type="file" placeholder="نام ویترین" class="form-control" name="file" value="">
    <input type="hidden" name="type" value="setting">
    <input type="submit" class="btn btn_send btn-block" name="submit" value="ثبت" >

<?php } ?>
    </fieldset>
</form>
<br>
<br>
<form action="operation.php" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>تغییر رمز عبور</legend>
        <input type="hidden" name="type" value="change_password">

        <input type="password" name="old_password" placeholder="رمز عبور قبلی" class="form-control">
        <input type="password" name="new_password" placeholder="رمز عبور جدید" class="form-control">
        <input type="password" name="renew_password" placeholder="تکرار رمز عبور جدید" class="form-control">
        <input type="submit" class="btn btn_send btn-block" name="submit" value="ثبت"  >

    </fieldset>
</form>
</body>
</html>