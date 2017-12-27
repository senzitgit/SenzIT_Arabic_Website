$(document).ready(function(){

 var large={width: "80%", height:"700px"};
 var small={width: "10%" , height:"700px"};
 

$(".img_content").hide();
$(".img_head").hide();

	$("#imgc > div").click(function(){
		$(this).animate(large,1000);
		$(this).find(".img_head").show("slow");
		$(this).find(".img_frt_pge").hide("slow");
		$(this).find(".img_content").show("slow");
	$("#imgc > div").not(this).each(function(){
		$(this).animate(small,'1000');
		$(this).find(".img_head").hide("slow");
		$(this).find(".img_frt_pge").hide("slow");
		$(this).find(".img_content").hide("slow");
		});
	
	});
	
	
	
	/* ------Profile Page---------- */


	$('.prof_back').hide();
	$('.connect_more').hide();	

   $('.prof_contain').click(function() { 
$('.prof_contain').not(this).hide("fast","swing");
$('.prof_desc').addClass("add_prof_dimension");
$('.prof_photo').addClass("add_prof_photo");
$('.prof_name').css("font-size","30px");
$('.prof_designation').css("font-size","20px");
$('.connect').hide();
$('.connect_more').show();
$('.prof_more').show();
$('.prof_back').show();
});

 $('.prof_back').click (function () {
        
        $('.prof_desc').removeClass("add_prof_dimension");
        $('.prof_photo').removeClass("add_prof_photo");
        $('.prof_name').css("font-size","15px");
        $('.prof_designation').css("font-size","13px");
	$('.connect').show();
	$('.connect_more').hide();	
	$('.prof_more').hide();
	$('.prof_contain').show();
	$('.prof_back').hide();       
    });

	
	
});