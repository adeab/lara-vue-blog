 $(document).ready(function () {

     // take the sidebar offset top
     var sticky = $("#rightBar").offset().top;
     $(window).scroll(function () {

         //make rightbar sticky
         if ($(window).scrollTop() > sticky) {
             $('#rightBar').addClass('sticky');
         }
         // make rightbar non-sticky
         else {
             $('#rightBar').removeClass('sticky');
         }
         //make rightbar bottom aligned as footer's bottom
         if ($('#rightBar').offset().top + $("#rightBar").height() > $("#footer").offset().top) {
            // $('#rightBar').css('bottom', ($("#footer").height())+200);   
            $('#rightBar').css('top', -($("#rightBar").offset().top + $("#rightBar").height() - $("#footer").offset().top));
              
            }
         else
         {
            $('#rightBar').css('top', '');
            // $('#rightBar').css('bottom', '');
         }

     });
 });
