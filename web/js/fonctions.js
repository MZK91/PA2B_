$(document).ready(function(){
	$(".menu_cat").click(function(){
	   $(this).next("ul.menu_ct_cat").slideDown("fast").siblings("ul.menu_ct_cat").slideUp("slow");
	});
});