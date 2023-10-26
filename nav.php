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
            <a class="navbar-brand page-scroll" href=" #page-top"><img src="images/LogoType.png" alt="josell"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a class="" href=" #" style="color:transparent">صفحه نخست</a>
                </li>
                <li class="inner-wrapper wrapper-15">
                    <a class="page-scroll link hover-15" href="index.php">صفحه نخست</a>
                </li>


                <li class="inner-wrapper wrapper-15">
                    <a class="page-scroll link hover-15" href="#plans">طرح ها</a>
                </li>
                <li class="inner-wrapper wrapper-15">
                    <a class="page-scroll link hover-15" href="#contrast">خدمات ما</a>
                </li>

                <li class="inner-wrapper wrapper-15">
                    <a class="page-scroll link hover-15" href=" #contact">ارتباط با ما</a>
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