jQuery(function($){
	var obj = {
		'products': [
			{
				'id': 2,
				'size': 3,
				'color': 2
			},
			{
				'id': 34,
				'size': 3,
				'color': 6
			},
			{
				'id': 17,
				'color': 2
			}
		]
	};
		
	var url = 'http://localhost/terminsprojekt/hm/json/set_cart.php';

	if(true){
		var json_string = JSON.stringify(obj, null, 2);
		$.post(
			url,
			{ 'json_obj': json_string },
			function(res){
				console.log(res);
				var link = 'http://localhost/terminsprojekt/hm/app/hm_app.php?cart=' + res;
				$('.qr').html('').qrcode({
					size: 200,
					text: link
				});
			}
		);
	}
});