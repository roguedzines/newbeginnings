jQuery(function($){
$(document).ready(function(){

	jQuery(function($){

  $('#nav ul.navigation').slicknav();
});

jQuery(function($){
  $("a[rel^='prettyPhoto']").prettyPhoto({

			deeplinking: false		,
	changepicturecallback: function(){}, /* Called everytime an item is shown/changed */
			callback: function(){}, /* Called when prettyPhoto is closed */
			ie6_fallback: true,
			});
});


    //portfolio items hover
    $("ul.portfolio li .portfolio-item").each(function() {
      $(this).hover(function() {
        $("<div class='overlay'></div>").prependTo(this);
        $(".overlay").fadeIn("slow");
        // $(this).find(".description").show();

        $(this).find(".thumb-info").fadeIn({queue:false,duration:"slow"});
				$(this).find(".thumb-info").animate({
					"top":"40%",
					opacity:1
				}, 500,"easeOutBounce");
				$(this).find(".zoom-in").animate({
					"top":"40%",
					opacity:1
				}, 500,"easeOutBounce");
      }, function() {
        // $(this).find(".description").hide();
				$(this).find(".thumb-info").animate({
					"top":"0%"
				}, 200,"linear");
        $(this).find(".thumb-info").fadeOut();
				//$(".overlay").fadeOut("slow");
        $(".overlay").remove();
      });
    });

    //end
    var isclicked = false;
$("ul.portfolio li .description-wrap").each(function(){

	var description = $(this).find(".description");
$(this).find(".thumb-description-link").click(function(){
isclicked = true;
console.log("is clicked");
if(isclicked === true){
  $(this).click(function(){
$(this).next(".description").show();
		console.log($(this));
		isclicked = false;
	});
}
});


if(isclicked === true){
alert(1);
	$(this).find(".thumb-description-link").click(function(){
		description.show();
		console.log("no longer clicked");
		isclicked = false;
	});
}

});

});
});
