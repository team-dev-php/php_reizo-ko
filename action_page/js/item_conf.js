$(document).on(".item_comfirm","click",()=>{
	let item_name = $("#mordal_item_name").val();
	let end_date  = $("#mordal_end_date").val();
	console.log(item_name);
	console.log(end_date);
	$(".item_name").val(item_name);
	// $("#category").val(category);
	$(".item_end_date").val(end_date);
});