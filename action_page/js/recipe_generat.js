$.ajax({
	url:"get_items.php"
}).done((data)=>{
	console.log(JSON.parse(data));
	// Go君のjs以下に記載
});