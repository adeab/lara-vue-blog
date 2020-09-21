$(document).ready(function () {
    // alert($("#footer").height());
    $(".sticker").sticky({
        topSpacing: 20,
        zIndex: 2,
        center: true,
        responsiveWidth: true,
        wrapperClassName: '',
        widthFromWrapper: false,
        bottomSpacing: $("#footer").height() + 270,

    });
    $(".sticker2").sticky({
        // topSpacing: 20,
        zIndex: 2,
        center: true,
        responsiveWidth: true,
        wrapperClassName: '',
        widthFromWrapper: false,
        // bottomSpacing: $("#footer").height() + 270,

    });

    var sticky = $("#rightBar").offset().top;
    $(window).scroll(function () {

        //make rightbar scrollable
        if ($(window).scrollTop() > sticky) {
            $('#rightBar').addClass('sticky-scroll');
        }
        // make rightbar non-scrollable
        else {
            $('#rightBar').removeClass('sticky-scroll');
        }
    });
});
