<div class="modal fade" id="edit_user" role="dialog" style="direction: rtl">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>



            </div>
            <div class="modal-body">

                       <p> فرم زیر را تکمیل نمایید. وارد کردن تمام موارد ستاره دار (* ) الزامیست</p>
                        <form role="form" action="operation.php" method="post" class="text-right" enctype="multipart/form-data">


                            <input type="hidden" name="type" value="signUp">
                            <div class="col-md-6 col-xs-12 ">
                                <label for="sign_fname">نام  *</label>
                                <input type="text" class="form-control" id="sign_fname" name="fname" value="" required>
                            </div>
                            <div class="col-md-6 col-xs-12 ">
                                <label for="sign_lname">نام خانوادگی *</label>
                                <input type="text" class="form-control" id="sign_lname" name="lname" required>
                            </div>
                            <div class="col-md-6 col-xs-12 ">
                                <label for="sign_code">کدملی *</label>
                                <input type="text" class="form-control" id="sign_code" name="code" required>
                            </div>

                            <div class="col-md-6 col-xs-12">
                                <label for="sign_pass">رمز عبور *</label>
                                <input type="password" class="form-control" id="sign_pass" name="password" required>
                            </div>


                            <div class="col-md-6 col-xs-12">
                                <label for="sign_rpass">تکرار رمز عبور *</label>
                                <input type="password" class="form-control" id="sign_rpass" name="re_password">
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label for="sign_rpass">آدرس ایمیل</label>
                                <input type="email" class="form-control" id="sign_rpass" name="email" required>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label for="sign_rpass">شماره همراه *</label>
                                <input type="text" class="form-control" id="sign_mobile" name="mobile" required>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label for="sign_rpass">شماره تلفن *</label>
                                <input type="text" class="form-control" id="sign_phone" name="phone" required>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label for="sign_rpass">تاریخ تولد</label>
                                <input type="text" class="form-control" id="sign_birth" name="birth">
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label for="sign_rpass">جنسیت</label>
                                <select name="gender" class="form-control" required>
                                    <option value="0">جنسیت خود را انتخاب کنید</option>
                                    <option value="1">زن</option>
                                    <option value="2">مرد</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <label for="sign_rpass">استان محل سکونت *</label>
                                <select name="state" class="form-control" required>
                                    <option value="0">استان محل زندگی خود را انتخاب کنید</option>
                                    <option value="1">تهران</option>
                                    <option value="1">البرز</option>
                                </select>
                            </div>

                            <div class="col-md-6 col-xs-12">
                                <label for="sign_rpass">آدرس محل سکونت *</label>
                                <textarea class="form-control" id="sign_rpass" name="address" required></textarea>
                            </div>

                            <div class="col-md-6 col-xs-12">
                                <input class="uploader__input" id="file-upload" type="file" name="file" accept="image/*"  />

                                <div class="preview img-wrapper"></div>
                                <div class="file-upload-wrapper">
                                    <input type="file" name="file" class="file-upload-native" accept="image/*" />
                                    <input type="text" disabled placeholder="تصویر کارت ملی *" class="file-upload-text" />
                                </div>
                                <!--<label for="sign_rpass">تصویر کارت ملی</label>-->
                                <!--<input type="file" class="form-control" id="sign_rpass">-->
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <input class="uploader__input" id="file-upload" type="file" name="image" accept="image/*"  />

                                <div class="preview img-wrapper"></div>
                                <div class="file-upload-wrapper">
                                    <input type="file" name="file" class="file-upload-native" accept="image/*"  name="image"/>
                                    <input type="text" disabled placeholder="تصویر شما*" class="file-upload-text" />
                                </div>
                                <!--<label for="sign_rpass">تصویر کارت ملی</label>
                                <!--<input type="file" class="form-control" id="sign_rpass">-->
                            </div>

                            <button type="submit" class="btn btn-primary  btn-block" name="submit" onclick="auth();">تایید و مرحله بعدی</button>
                        </form>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">بستن</button>
            </div>
        </div>

    </div>
</div>


