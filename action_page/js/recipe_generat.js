$.ajax({
	url:"get_items.php"
}).done((data)=>{
	console.log(JSON.parse(data));
});