<?php
//شروع یک نشست
//session_start();
$user_id=$_SESSION['id'];

connect();
$page='Admin_Credits';
?>
<?php  if(isset($_GET['message'])) {?><p class="show_message" id="message_fade"><?php echo $_GET['message'];} ?></p>
<div class="row credit text-center">
    <form action="operation.php" method="post"  class="form-group">
        <input type="hidden" name="type" value="payment">
       <div class="col-sm-4"> <input type="text"  value="<?php

           $select=select("select * from link_users where user_id='$user_id'");
           $res=fetch_result($select);
           foreach ($res as $res)
           { echo $res['user_credit'];}
           ?>" placeholder="مبلغ درخواستی به تومان" name="amount"></div>
        <div class="col-sm-4"> <input type="text" name="sheba" id="sheba" placeholder="شماره شبا"></div>
        <div class="col-sm-4"> <input typ="text" name="name" placeholder="به نام"></div>
        <div class="col-sm-offset-4 col-sm-4"> <input type="submit" value="ثبت" class="btn btn-primary text-center " ></div>
    </form>
</div>
    <div class="row">
    <table class=" table table-responsive table-stripped text-center" >
    <thead class="text-center">

    <th>میزان</th>

    <th>وضعیت</th>
    <th>توضیحات</th>

    </thead>
    <tbody>
    <?php

    $select=select("SELECT * FROM  link_payment where user_id='$user_id'  ORDER BY payment_id DESC");
    $rec=fetch_result($select);
    foreach($rec as $rec) {
        ?>
        <tr>

            <td><?php echo $rec['payment_amount']?></td>
            <td><?php echo $rec['payment_status']?></td>
            <td><?php echo $rec['payment_description']?></td>



        </tr>


        <?php
    }
    ?>
    </tbody>
</table>
</div>
</body>
</html>