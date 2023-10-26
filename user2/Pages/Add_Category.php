<form role="form" action="operation.php" method="post" class="text-right" enctype="multipart/form-data">
    <h4> افزودن محصول</h4>

    <input type="hidden" name="type" value="add_category">

    <div class="col-md-6 col-xs-12 ">
        <label for="sign_fname">نام دسته بندی  *</label>
        <input type="text" class="form-control"  name="name"  required>
    </div>

    <button type="submit" class="btn btn_send btn-block" name="submit" >افزودن</button>
</form>
