$(document).on("click",".item_comfirm",()=>{
	let item_name = $("#mordal_item_name").val();
	let end_date  = $("#mordal_end_date").val();
	// console.log(item_name);
	// console.log(end_date);
	$(".item_name").html(item_name);
	$(".item_name").val(item_name);
	
	// $("#category").val(category);
	$(".item_end_date").html(end_date);
	$(".item_end_date").val(item_name);

});