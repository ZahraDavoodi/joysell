<div class="modal fade" id="myModal" role="dialog" style="direction: rtl">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#login_tab">ورود</a></li>
                    <li><a data-toggle="tab" href="#signup_tab">عضویت</a></li>

                </ul>


            </div>

            <div class="modal-body">
                <div class="tab-content">
                    <div id="login_tab" class="tab-pane fade in active">
                        <p class="message_modal"><?php if(isset($_GET['message']) &&isset($_GET['type'])){ echo $_GET['message'];} ?></p>
                        <form role="form" action="login.php" method="post" class="text-right">

                            <div class="form-group ">
                                <label for="username">آدرس پست الکترونیک</label>
                                <input type="email" class="form-control"  placeholder="پست الکترونیک" name="username">
                            </div>

                            <div class="form-group">
                                <label for="pwd">رمز عبور</label>
                                <input type="password" class="form-control" id="pwd" name="password">
                            </div>
                            <div class="checkbox">

                                <input type="hidden" name="check" value="sended">

                                <input type="checkbox" name="remember" value="true">
                                <label style="margin-right:20px">

                                    مرا به خاطر بسپار
                                </label>
                            </div>

                            <div class="forgot">
                                <a  data-toggle="modal" data-target="#forgot_password" href=""> رمز عبور خود را فراموش کردید</a>

                            </div>
                            <button type="submit" class="btn btn-primary  btn-block">ورود</button>
                        </form>
                    </div>
                    <div id="signup_tab" class="tab-pane fade">
                        <p> فرم زیر را تکمیل نمایید. وارد کردن تمام موارد ستاره دار (* ) الزامیست</p>

                        <form role="form" action="operation.php" method="post" class="text-right" enctype="multipart/form-data">
                            <input type="hidden" name="type" value="order_store">
                            <div class="col-md-6 col-xs-12">
                                <label for="sign_fname">نام *</label>
                                <input type="text" class="form-control"  name="fname" required>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label for="sign_fname">نام خانوادگی*</label>
                                <input type="text" class="form-control" id="lname" name="lname" required>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label for="sign_fname">پست الکترونیک*</label>
                                <input type="email" class="form-control"  name="email" required>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label for="sign_fname">تلفن همراه*</label>
                                <input type="text"  id="mobile" class="form-control"  name="mobile" required>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label for="sign_fname">رمز عبور *</label>
                                <input type="password" class="form-control"  name="password"  required>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label for="sign_fname">تکرار رمز عبور *</label>
                                <input type="password" class="form-control"  name="repassword"  required>
                            </div>


                            <button type="submit" class="btn btn-primary  btn-block" name="submit" >ثبت </button>
                        </form>

                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">بستن</button>
            </div>
        </div>

    </div>
</div>
<div class="modal fade" id="PasswordModal" role="dialog" style="direction: rtl">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <p>تغییر رمز عبور</p>

            </div>
            <div class="modal-body">

                <form role="form" action="operation.php" method="post" class="text-right" >
                    <input type="hidden" name="type" value="change_password">
                    <div class="form-group ">
                        <label for="password">رمز عبور کنونی</label>
                        <input type="password" class="form-control" id="password" placeholder="" name="password">
                    </div>
                    <div class="form-group">
                        <label for="newPassword">رمز عبور جدید</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword">
                    </div>
                    <div class="form-group">
                        <label for="reNewPassword">تکرار رمز عبور جدید</label>
                        <input type="password" class="form-control" id="reNewPassword" name="reNewPassword">
                    </div>
                    <input type="hidden" name="check" value="sended">

            </div>

            <button type="submit" class="btn btn-block">اعمال تغییرات</button>
            </form>
        </div>

    </div>

</div>
<div class="modal fade" id="forgot_password" role="dialog" style="direction: rtl">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <p>فراموشی رمز عبور</p>

            </div>
            <div class="modal-body">
                <form role="form" action="operation.php" method="post" class="text-right" enctype="multipart/form-data">
                    <input type="hidden" name="type" value="forgot">
                    <p>آدرس ایمیل خود را جهت ارسال ایمیل بازیابی رمز عبور وارد کنید.</p>
                    <div class="col-md-6 col-xs-12 ">
                        <label for="sign_fname">آدرس ایمیل  *</label>
                        <input type="email" class="form-control"  name="email" required>
                    </div>

                    <button type="submit" class="btn btn-primary  btn-block" name="submit" >ارسال </button>
                </form>
            </div>


        </div>

    </div>
</div>
<div class="modal fade" id="order_store" role="dialog" style="direction: rtl">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <p>ایجاد ویترین آنلاین</p>

            </div>
            <div class="modal-body">
                <form role="form" action="operation.php" method="post" class="text-right" enctype="multipart/form-data">
                    <input type="hidden" name="type" value="order_store">
                    <div class="col-md-6 col-xs-12">
                        <label for="sign_fname">نام *</label>
                        <input type="text" class="form-control"  name="fname" required>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <label for="sign_fname">نام خانوادگی*</label>
                        <input type="text" class="form-control"  name="lname" required>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <label for="sign_fname">پست الکترونیک*</label>
                        <input type="email" class="form-control"  name="email" required>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <label for="sign_fname">تلفن همراه*</label>
                        <input type="text"  id="mobile" class="form-control"  name="mobile" required>
                    </div>

                    <div class="col-md-6 col-xs-12">
                        <label for="sign_fname">رمز عبور *</label>
                        <input type="password" class="form-control"  name="password"  required>

                    </div>
                    <div class="col-md-6 col-xs-12">
                        <label for="sign_fname">تکرار رمز عبور *</label>
                        <input type="password" class="form-control"  name="repassword"  required>
                    </div>


                    <button type="submit" class="btn btn-primary  btn-block" name="submit" >ثبت </button>
                </form>
            </div>


        </div>

    </div>
</div>



<div class="modal fade" id="customer_modal" role="dialog" style="direction: rtl">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#login_tab1">ورود</a></li>
                    <li><a data-toggle="tab" href="#signup_tab1">عضویت</a></li>

                </ul>


            </div>

            <div class="modal-body">
                <div class="tab-content">
                    <div id="login_tab1" class="tab-pane fade in active">
                        <p class="message_modal"><?php if(isset($_GET['message']) &&isset($_GET['type'])){ echo $_GET['message'];} ?></p>
                        <form role="form" action="operation.php" method="post" class="text-right">

                            <div class="form-group ">
                                <label for="username">آدرس پست الکترونیک</label>
                                <input type="email" class="form-control"  placeholder="پست الکترونیک" name="username">
                            </div>

                            <div class="form-group">
                                <label for="pwd">رمز عبور</label>
                                <input type="password" class="form-control" id="pwd" name="password">
                            </div>
                            <input type="hidden" class="form-control"  name="type" value="login_customer">
                            <div class="checkbox">

                                <input type="hidden" name="check" value="sended">

                                <input type="checkbox" name="remember" value="true">
                                <label style="margin-right:20px">

                                    مرا به خاطر بسپار
                                </label>
                            </div>

                            <div class="forgot">
                                <a  data-toggle="modal" data-target="#forgot_password" href=""> رمز عبور خود را فراموش کردید</a>

                            </div>
                            <button type="submit" class="btn btn-primary  btn-block">ورود</button>
                        </form>
                    </div>
                    <div id="signup_tab1" class="tab-pane fade">
                        <p> فرم زیر را تکمیل نمایید. وارد کردن تمام موارد ستاره دار (* ) الزامیست</p>

                        <form role="form" action="operation.php" method="post" class="text-right" enctype="multipart/form-data">
                            <input type="hidden" name="type" value="signUp_customer">
                            <div class="col-md-6 col-xs-12">
                                <label for="sign_fname">نام و نام خانوادگی*</label>
                                <input type="text" class="form-control"  name="fname" required>
                            </div>

                            <div class="col-md-6 col-xs-12">
                                <label for="sign_fname">پست الکترونیک*</label>
                                <input type="email" class="form-control"  name="email" required>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label for="sign_fname">تلفن همراه*</label>
                                <input type="text"  id="mobile" class="form-control"  name="mobile" required>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label for="sign_fname">رمز عبور *</label>
                                <input type="password" class="form-control"  name="password"  required>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label for="sign_fname">تکرار رمز عبور *</label>
                                <input type="password" class="form-control"  name="repassword"  required>
                            </div>

                            <div class="col-md-6 col-xs-12">
                                <label for="sign_fname">آدرس جهت ارسال *</label>
                                <textarea class="form-control" name="address"></textarea>
                            </div>
                            <input type="hidden" class="form-control"  name="type" value="signUp_customer">



                            <button type="submit" class="btn btn-primary  btn-block" name="submit" >ثبت </button>
                        </form>

                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">بستن</button>
            </div>
        </div>

    </div>
</div>