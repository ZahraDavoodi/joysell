
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="js/jquery.easing.min.js"></script>
<script src="js/jquery.fittext.js"></script>
<script src="js/wow.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/creative.js"></script>
<script src="js/jquery.maskedinput.js"></script>
<script src="js/liteaccordion.jquery.js"></script>


<!-- easing -->
<script src="js/jquery.easing.1.3.js"></script>




<!-- easing -->
<script src="js/jquery.easing.1.3.js"></script>

<!-- liteAccordion js -->
<script src="js/liteaccordion.jquery.js"></script>
<script src="js/owl.carousel.js"></script>

<script>
    $(function() {

        new WOW().init();
        $("#ident").mask("9999999999");
        $("#mobile").mask("9999-9999999");
        $("#phone").mask("999-99999999");
        $("#username").mask("9999999999");
        $("#forgot_code").mask("9999999999");



        $('.page-scroll').click(function(event) {

            // On-page links
            if (
                location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                &&
                location.hostname == this.hostname
            ) {
                // Figure out element to scroll to
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                // Does a scroll target exist?
                if (target.length) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top-400

                    }, 1000
                   });
                }
            }
        });




    });

</script>


<script>

    $(document).ready(function () {
        <?php if(isset($_GET['message']) &&isset($_GET['type'])){ ?>

        $('#myModal').modal('show');
        <?php } ?>

        setTimeout(function message_fade(){$("#message_fade").fadeOut();},1000);
       
    })
</script>
