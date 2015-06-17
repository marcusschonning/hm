jQuery(function($){
	var products = [];

	if($('body').hasClass('post-type-archive-products')){
		$('.product-link').on('click', function(e) {
			e.preventDefault();
			var url = $(this).attr('href');
			$.ajax({
				url: url
			}).done(function(res) {
				$('.content').html( res );
			});
		});

		$('.content').delegate('.close', 'click', function(){
			$('.content').html('');
		});

		$('.content').delegate('.add-to-cart', 'click', function(){

			var id = parseInt($(this).siblings('.title').attr('product-id'));
			console.log(id);
			
			var price = parseInt($(this).siblings('.price').text());
			console.log(price);

			var color = $(this).siblings('.colors').children('input[type="radio"][name="color"]:checked').val();
			console.log(color);

			var size = $(this).siblings('.sizes').children('input[type="radio"][name="size"]:checked').val();
			console.log(size);
			
			products.push(JSON.stringify({id:id, price:price, color:color, size:size})
			);



			console.log(products);
			

			localStorage.setItem('products', products);
		});
	}

	


		
		
	var url = 'http://localhost/terminsprojekt/hm/json/set_cart.php';

	if($('body').hasClass('page-template-template-checkout')){
		var obj = { 'products':localStorage.getItem('products') };
		var json_string = JSON.stringify(obj);
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