    <form role="form" action="?Page=Admin_Comments" method="post" class="text-right" enctype="multipart/form-data">
    <h4>مشاهده نظرات</h4>
    <?php
    $id=$_GET['id'];
    $select=select("select * from link_comments WHERE comment_id='$id' ");

    $results=fetch_result($select);
    foreach ($results as $results)
    {
    ?>
        <input type="hidden" name="type" value="edit_message">
        <input type="hidden" name="id" value="<?php echo $results['comment_id'];?>">
        <div class="col-md-6 col-xs-12 ">
            <label for="sign_fname">نویسنده</label>
            <input type="text" class="form-control" name="news_title" value="<?php echo $results['comment_fullName'];?>" readonly required>
        </div>
        <div class="col-md-6 col-xs-12 ">
            <label for="sign_fname">ایمیل*</label>
            <input type="email" class="form-control"  name="message_email" value="<?php echo $results['comment_email'];?>" readonly  required>
        </div>
        <div class="col-md-6 col-xs-12 ">
            <label for="sign_lname">عنوان*</label>
            <input class="form-control"  name="message_subject"  readonly  required value="<?php echo $results['comment_subject'];?>">
        </div>
        <div class="col-md-6 col-xs-12 ">
            <label for="sign_lname">متن*</label>
            <textarea class="form-control"  name="message_message"  readonly required><?php echo $results['comment_text'];?></textarea>
        </div>
        <div class="col-md-6 col-xs-12 ">
            <label for="sign_lname">تاریخ *</label>
            <input class="form-control"  id="date_comment" name="message_date"  value="<?php echo $results['comment_date'];?>" required readonly >
        </div>
   <br>
        <button type="submit" class="btn btn_send btn-block" name="submit" >تایید و بازگشت</button>
        <?php }?>
    </form>
</div>