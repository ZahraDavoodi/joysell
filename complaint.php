<?php include 'DB.php'; connect(); include "head.php";?>
<body>
<?php include 'nav_part.php';?>
<div class="container">
    <div class="row rules">
        <div class="title">ثبت شکایات</div>
        <p>
            دوست عزیز
            <br>
            برای ثبت شکایت خود از سایت جویسل و یا هر یک از صاحبان ویترین فرم زیر را پر کنید
            همکاران ما دراولین فرصت به شکایت شما رسیدگی می کنند.

        </p>
        <form class="form-group text-center wow bounceInLeft"  data-wow-delay="0.3s" method="post" action="operation.php">
            <input type="hidden" name="type" value="complaint">
            <input type="text" name="fullName" placeholder="نام شما" class="form-control">
            <input type="text" name="subject" placeholder="موضوع شکایت - نام ویترین آنلاین و یا سایت جویسل را وارد کنید" class="form-control">
            <input type="email" name="email" placeholder="پست الکترونیک" class="form-control">
            <input type="mobile" name="mobile" placeholder="شماره تلفن" class="form-control">
            <textarea name="text" placeholder="پیام شما" class="form-control"></textarea>
            <input type="submit" name="submit"  class=" btn btn-info" value="ارسال">
        </form>
    </div>
</div>
<?php include 'footer.php'; include "scripts.php"?>
</body>
