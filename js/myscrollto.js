jQuery(function($) {
    $(document).ready(function() {

        jQuery(function($) {
            // $('ul.navigation li a[href^="#"]').on('click', function (e) {
            //         e.preventDefault();


            //         var target = this.hash;
            //         var $target = $(target);


            //         $('html, body').stop().animate({'scrollTop': $target.offset().top}, 1000, 'easeInOutQuint');
            //         $(this).parent().addClass('active').siblings().removeClass('active');



            //     }

            // );
  $('ul.navigation li a, ul.slicknav_nav li a, #logo a').click(function(evn){
        evn.preventDefault();
        $('html,body').scrollTo(this.hash, this.hash, {offset: function() { return {top:-80, left:0}; }}); 

    });
             /**
     * This part handles the highlighting functionality.
     * We use the scroll functionality again, some array creation and 
     * manipulation, class adding and class removing, and conditional testing
     */
    var aChildren = $("ul.navigation li, ul.slicknav_nav li").children(); // find the a children of the list items
    var aArray = []; // create the empty aArray
    for (var i=0; i < aChildren.length; i++) {    
        var aChild = aChildren[i];
        var ahref = $(aChild).attr('href');
        aArray.push(ahref);
    } // this for loop fills the aArray with attribute href values
    $(window).scroll(function(){
        var windowPos = $(window).scrollTop() +160; // get the offset of the window from the top of page
        var windowHeight = $(window).height() ; // get the height of the window
        var docHeight = $(document).height() ;

        for (var i=0; i < aArray.length; i++) {
            var theID = aArray[i];
            var divPos = $(theID).offset().top; // get the offset of the div from the top of page
            var divHeight = $(theID).height(); // get the height of the div in question
            if (windowPos >= divPos && windowPos < (divPos + divHeight)) {
                $("ul.navigation li a[href='" + theID + "'], ul.slicknav_nav li a[href='" + theID + "']").addClass("active");
            } else {
                $("ul.navigation li a[href='" + theID + "'], ul.slicknav_nav li a[href='" + theID + "']").removeClass("active");
            }
        }

        if(windowPos + windowHeight == docHeight) {
            if (!$("ul.navigation li:last-child a, ul.slicknav_nav li:last-child a").hasClass("active")) {
                var navActiveCurrent = $(".active").attr("href");
                $("ul.navigation li a[href='" + navActiveCurrent + "'], ul.slicknav_nav li a[href='" + navActiveCurrent + "']").removeClass("active");
                $("ul.navigation li:last-child a, ul.slicknav_nav li:last-child a").addClass("active");
            }
        }
    });

        });
    });
});