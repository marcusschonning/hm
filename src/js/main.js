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
			var price = parseInt($(this).siblings('.price').text());
			var color = $(this).siblings('.colors').children('input[type="radio"][name="color"]:checked').val();
			var size = $(this).siblings('.sizes').children('input[type="radio"][name="size"]:checked').val();
			products.push({
				'id': id,
				'price': price,
				'color': color,
				'size': size
			});
			console.log(id);
			console.log(price);
			console.log(color);
			console.log(size);
			console.log(products);
			
			var obj = JSON.stringify({ 'products': products });
			localStorage.setItem('products', obj);
		});
	}
	
	if($('body').hasClass('page-template-template-checkout')){
		var url = 'http://localhost/terminsprojekt/hm/json/set_cart.php';
		$.post(
			url,
			{ 'json_obj': localStorage.getItem('products') },
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