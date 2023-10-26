<?php session_start(); ?>
<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href=" #page-top">برند</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a class="" href=" #" style="color:transparent"></a>
                </li>
                <li class="inner-wrapper wrapper-15">
                    <a class="page-scroll link hover-15" href="index.php">صفحه نخست</a>
                </li>

                <li class="inner-wrapper wrapper-15">
                    <a class="page-scroll link hover-15" href="index.php#steps">روش کار</a>
                </li>
                <li class="inner-wrapper wrapper-15">
                    <a class="page-scroll link hover-15" href="index.php#plans">طرح ها</a>
                </li>
                <li class="inner-wrapper wrapper-15">
                    <a class="page-scroll link hover-15" href="index.php#contrast">ویژگی ها</a>
                </li>

                <li class="inner-wrapper wrapper-15">
                    <a class="page-scroll link hover-15" href="index.php#footer">ارتباط با ما</a>
                </li>

                <?php
                if(isset($_SESSION['fullName']))
                {
                    ?><li class="inner-wrapper wrapper-15"><a class="page-scroll link hover-15" href="user">        پنل کاربری<?php  echo ' '. $_SESSION['fullName']; ?></a></li>

                    <?php
                }
                else
                {



                    echo ' <li class="inner-wrapper wrapper-15">
                    <a class="page-scroll link hover-15" href=" #"  data-toggle="modal" data-target="#myModal">ورود/ عضویت</a>

                </li>';
                }

                ?>

        </ul>
    </div>
    <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<?php
include "scripts.php";
include "modal.php"; ?>