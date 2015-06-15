jQuery(function($){
	 
		var products = [
			{
				'id': 656,
				'size': 666,
				'color': 666
			},
			{
				'id': 3,
				'size': 5,
				'color': 9
			},
			{
				'id': 15,
				'color': 1
			}
		];

		
		
	var url = 'http://localhost/terminsprojekt/hm/json/set_cart.php';

	if(true){
		var obj = { 'products':products };
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