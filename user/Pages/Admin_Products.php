<?php
//شروع یک نشست
//session_start();
$user_id=$_SESSION['id'];

connect();
$page='Admin_Products';
?>

<?php  if(isset($_GET['message'])) {?><p class="show_message" id="message_fade"><?php echo $_GET['message'];} ?></p>
<table class="table table-responsive table-stripped " id="table">
    <thead>



    <th>نام محصول</th>
    <th>قیمت محصول</th>
    <th>تعداد محصول</th>

    <th>عملیات</th>




    </thead>
    <tbody>
    <?php

    $select=select("SELECT * FROM  link_products where user_id='$user_id' ORDER BY product_id");
    $rec=fetch_result($select);
    foreach($rec as $rec) {
        ?>
        <tr>

            <td><?php echo $rec['product_name']?></td>
            <td><?php echo $rec['product_price'];?></td>
            <td><?php echo $rec['product_number'];?></td>

            <td>
                <div class="btn-group btn-group-xs">
                    <a href="?Page=Edit_Product&&id=<?php echo $rec['product_id']; ?>" class="btn btn-success"  >ویرایش</a>
                </div>
                <div class="btn-group btn-group-xs">

                    <a type="button" class="btn btn-danger" href="operation.php?type=del_product&&id=<?php echo $rec['product_id']; ?>"">حذف</a>

                </div>

                <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal">لینک پرداخت</button>

                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">لینک پرداخت</h4>
                           </div>
                            <div class="modal-body">
                                <p>
                                <?php
                                $select1=select("SELECT * FROM  link_users where user_id='$user_id' ORDER BY user_id");
                                $rec1=fetch_result($select1);
                                foreach($rec1 as $rec1) {

                                    if($rec1['user_state']==0)
                                    {
                                        echo 'لینک پرداخت تنها بعد از اطلاعات هویت شما نمایش داده میشود.لطفا وارد تنظیمات حساب کاربری شده و تصویر کارت ملی خود را ارسال نمایید. بعد از تایید ،لینک به شما به نمایش درخواهد آمد';

                                    }
                                    if($rec1['user_state']==2)
                                    {
                                        echo 'تصویر کارت ملی ارسال شده، توسط شما مورد تایید قرار نگرفت . لطفا تصویر درستی آپلود کنید';

                                    }
                                    if($rec1['user_state']==1){
                                ?>

                                    <table class="table_modal">
                                      <tr>
                                          <td><label>لینک پرداخت</label></td>
                                          <td><input value="<?php echo $rec['product_link'] ?>" class="form-control" id="myInput1"></td>
                                          <td><div class="button_modal" onclick="copyLink1()"><span title="کپی لینک " class="fa fa-copy"></span></div></td>
                                      </tr>
                                    <tr>
                                        <td><label>دکمه پرداخت</label></td>
                                        <td><input value="<?php echo "<a  href=".$rec['product_link']."><button style='width: 70px; height: 50px; border-radius: 5px; background-image: url(http://joysell.ir/images/button.jpg); background-position: center; background-size: cover' ></button></a>" ?>" class="form-control" id="myInput2"></td>

                                        <td><div class="button_modal" onclick="copyLink2()"><span title="کپی لینک " class="fa fa-copy"></span> </div></td>
                                    </tr>
                                </table>

                               <?php } }?>



                                </p>
                            </div>

                        </div>

                    </div>
                </div>






            </td>


        </tr>


        <?php
    }
    ?>
    </tbody>
</table>
</body>
</html>