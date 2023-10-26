<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<?php include 'DB.php'; connect(); include "head.php";?>
<?php  if(isset($_GET['message'])&& !isset($_GET['type'])) {?><p class="show_message" id="message_fade"><?php echo $_GET['message'];} ?></p>
<body id="page-top">


<!-- Modal -->
<?php include "nav.php"; include "modal.php"?>
<header>
    <div class="header-content">
        <div class="header-content-inner">
            <div class="row" id="welcome_txt">
                <div class="col-sm-6">
                    <h1>جوی سل لذت فروش در شبکه های اجتماعی</h1>
                    <p>در کمتر از 5 دقیقه محصولاتت رو تعریف کن ، لینک محصول به ازای هر محصول بگیر و از خرید و فروش امن ، سریع و آسان در شبکه های اجتماعی لذت ببر .</p>

                    <button class='myButt five wow fadeIn' data-wow-delay="0.7s">
                        <a  class="page-scroll"  data-toggle="modal" data-target="#order_store" href="">
                        <div class='layer'>بزن بریم!!!!</div>

                        ایجاد ویترین آنلاین
                        </a>
                    </button>
                    <button class='myButt five wow fadeIn' data-wow-delay="0.5s">
                        <a href="#steps" class="page-scroll">
                        <div class='layer'>بیشتر بدانید</div>
                       روند کار
                        </a>
                    </button>

                   
                </div>
                <div class="col-sm-6  wow fadeIn"  data-wow-delay="0.6s">
                    <img src="images/site.png" class="img-rounded  img-responsive">
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container">

    <section id="steps">
        <div class="title wow zoomIn"  data-wow-delay="0.1s">
            جوی سل چگونه کار میکند ؟
        </div>
        <div class="row wow  zoomIn" data-wow-delay="0.3s">
            <div class="col-sm-4 col-md-2">
                <img src="images/sequence1.jpg" class="img-responsive">

            </div>
            <div class="col-sm-4 col-md-2">
                <img src="images/sequence2.jpg" class="img-responsive">
            </div>
            <div class="col-sm-4 col-md-2">
                <img src="images/sequence3.jpg" class="img-responsive">
            </div>
            <div class="col-sm-4 col-md-2">
                <img src="images/sequence4.jpg" class="img-responsive">
            </div>
            <div class="col-sm-4 col-md-2">
                <img src="images/sequence5.jpg" class="img-responsive">
            </div>
            <div class="col-sm-4 col-md-2">
                <img src="images/sequence6.jpg" class="img-responsive">
            </div>
        </div>
    </section>
    <section id="plans">
        <div class="title wow  zoomIn"  data-wow-delay="0.1s">
            طرح های جوی سل
        </div>

        <div class="row wow  zoomIn"  data-wow-delay="0.3s">
            <div class="col-xs-12 col-md-3">
                <div class="panel">
                    <div class="cnrflash">
                        <div class="cnrflash-inner">
                        <span class="cnrflash-label">طرح
                            <br>
                            عادی
                        </span>
                        </div>
                    </div>
                    <div class="panel-heading">
                        <h3 class="panel-title"></h3>
                    </div>
                    <div class="panel-body">
                        <div class="the-price">
                            <h1>0 تومان</h1>

                        </div>
                        <table class="table">
                            <tr>
                                <td>
                                    امکان افزودن   10 محصول
                                </td>
                            </tr>
                            <tr class="active">
                                <td>
                                    دریافت لینک به ازای هر محصول
                                </td>
                            </tr>
                            <tr class="active">
                                <td>
                                    نمایش ویترین آنلاین
                                </td>
                            </tr>

                        </table>
                    </div>
                    <div class="panel-footer text-center" >
                        <?php if(isset($_SESSION['username'])){?>
                            <a href="#" class="btn btn-1 " onclick="alert('شما زمان ثبت نام از این طرح استفاده کردید');">
                                <svg>
                                    <rect x="0" y="0" fill="none" width="100%" height="100%"/>
                                </svg>
                                سفارش
                            </a>

                        <?php } else { ?>
                            <a href="#" class="btn btn-1"  data-toggle="modal" data-target="#order_store" title="برای سفارش ابتداباید وارد شوید">
                                <svg>
                                    <rect x="0" y="0" fill="none" width="100%" height="100%"/>
                                </svg>
                                ورود
                            </a>
                        <?php }?>

                    </div>
                </div>
            </div>
            <?php
            $select= select("select * from link_plans");
            $rec=fetch_result($select);
            foreach ($rec as $rec)
            {
                ?>


                <div class="col-xs-12 col-md-3" >
                    <div class="panel">
                        <div class="cnrflash">
                            <div class="cnrflash-inner">
                        <span class="cnrflash-label">طرح
                            <br>
                            <?php echo $rec['plan_name']; ?>
                        </span>
                            </div>
                        </div>
                        <div class="panel-heading">
                            <h3 class="panel-title"></h3>
                        </div>
                        <div class="panel-body">
                            <div class="the-price">
                                <h1>  <?php echo $rec['plan_price']; ?> تومان</h1>

                            </div>
                            <table class="table">
                                <tr>
                                    <td>
                                        امکان افزودن   <?php echo $rec['plan_pnumber']; ?> محصول
                                    </td>
                                </tr>
                                <tr class="active">
                                    <td>
                                        دریافت لینک به ازای هر محصول
                                    </td>
                                </tr>
                                <tr class="active">
                                    <td>
                                        نمایش ویترین آنلاین
                                    </td>
                                </tr>

                            </table>
                        </div>
                        <div class="panel-footer text-center" >
                            <?php if(isset($_SESSION['username'])){?>
                                <a href="submit.php?id=<?php echo $rec['plan_id'];?>" class="btn btn-1 ">
                                    <svg>
                                        <rect x="0" y="0" fill="none" width="100%" height="100%"/>
                                    </svg>
                                    سفارش
                                </a>

                            <?php } else { ?>
                                <a href="#" class="btn btn-1"  data-toggle="modal" data-target="#myModal" title="برای سفارش ابتداباید وارد شوید">
                                    <svg>
                                        <rect x="0" y="0" fill="none" width="100%" height="100%"/>
                                    </svg>
                                   ورود
                                </a>
                            <?php }?>

                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>

    </section>
    <section id="contrast">
        <div class="title wow  zoomIn"  data-wow-delay="0.1s">

            چه چیزی جوی سل را متمایز میکند؟
        </div>
        <div class="row text-center wow zoomIn "  data-wow-delay="0.3s">
            <div class="col-sm-6 ">
                <h4>تسهیل فروش محصولات در شبکه های اجتماعی</h4>
                <p>
                    یکی از دغدغه های فروشندگان محصولات و خدمات در شبکه های اجتماعی ، نحوه تسویه صورتحساب می باشد به طوری که اکثر پرداخت ها به صورت کارت به کارت و یا پرداخت در محل بوده که این خود مشکلاتی را برای فروشندگان و خریداران به وجود می آورد . پی بای به شما این امکان را می دهد تا بتوانید محصولات خود را در پنل مدیریت تعریف نموده و به ازای هر محصول یک لینک پرداخت اختصاصی دریافت نمائید . تنها کافیست لینک دریافتی را در پست مربوط به هر محصول قرار داده تا مبلغ دریافتی از مشتری مستقیماً به کیف پول الکترونیکی شما منتقل شود .

                </p>
            </div>
            <div class="col-sm-6 hidden-xs">
                <img src="images/s5.jpg" class="img-responsive">
            </div>
        </div>
        <div class="row text-center  zoomIn"  data-wow-delay="0.4s">
            <div class="col-sm-6 hidden-xs">
                <img src="images/s4.png" class="img-responsive">
            </div>
            <div class="col-sm-6">
                <h4>یک ویترین آنلاین رایگان</h4>
                <p>
                    با تعریف محصولات در پنل مدیریت علاوه بر دریافت لینک پرداخت ، یک ویترین آنلاین خواهید داشت . هر ویترین یک URL اختصاصی همانندjoysell.ir/user  دارد که نام کاربری جایگزین کلمه user می گردد . حالا می تونید آدرس فروشگاهتون رو به دوستانتون بدید و خودتون رو برای فروش محصولات به هزاران نفر که از طریق موتورهای جستجو وارد ویترین شما میشن آماده کنید .

                </p>
            </div>
        </div>
        <div class="row text-center   zoomIn"  data-wow-delay="0.5s">

            <div class="col-sm-6">
                <h4>پیگیری سفارشات</h4>
                <p>
                    پیگیری سفارشات برای خریداران و فروشندگان کالا در شبکه های اجتماعی همواره دردسرهای عظیمی را به همراه داشته و مستلزم برقرای تماس تلفنی یا پیامکی مکرر می باشد . با جوی سل به سادگی با چند کلیک سفارشات را پیگیری و گزارشی کاملی از مشتریان خود و تراکنش ها و سفارشات آنها داشته باشید .

                </p>
            </div>
            <div class="col-sm-6 hidden-xs">
                <img src="images/s7.jpg" class="img-responsive">
            </div>
        </div>
        <div class="row text-center  zoomIn"  data-wow-delay="0.6s">
            <div class="col-sm-6 hidden-xs">
                <img src="images/s8.png" class="img-responsive">
            </div>
            <div class="col-sm-6">
                <h4>انتقال وجه از کیف پول الکترونیکی به حساب شما در هر بانک بدون کارمزد </h4>
                <p>
                    1 – انتقال وجه از طریق شماره شبا :  هر زمان که بخواهید می توانید درخواست انتقال وجه از کیف پول الکترونیکی به حساب بانکی خودتان را ثبت نمائید و حداکثر ظرف 2 روز کاری مبالغ درخواستی از طریق شماره شبا به حسابتان واریز می گردد .
                    <br>
                    2 - انتقال وجه آنی از کیف پول به حساب بانک گردشگری  : درخواست انتقال وجه از کیف پول به حساب بانکی برای مشتریان بانک گردشگری به صورت آنی بوده و موجودی کیف پول هر زمان که بخواهید به صورت لحظه ای به حساب شما نزد بانک گردشگری منتقل می گردد .


                </p>
            </div>

        </div>

    </section>
    <section id="contact">
        <div class="title wow  zoomIn"  data-wow-delay="0.1s">ارتباط با ما</div>
        <form class="form-group text-center wow  zoomIn"  data-wow-delay="0.3s" method="post" action="operation.php">
            <input type="hidden" name="type" value="comments">
            <input type="text" name="fullName" placeholder="نام شما" class="form-control">
            <input type="text" name="subject" placeholder="موضوع" class="form-control">
            <input type="email" name="email" placeholder="پست الکترونیک" class="form-control">
            <textarea name="comment" placeholder="پیام شما" class="form-control"></textarea>
            <input type="submit" name="submit"  class="form-control btn btn-info" value="ارسال">
        </form>
    </section>

</div>

<?php
include "footer.php";
include "scripts.php"
?>
</html>
