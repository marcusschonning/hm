jQuery(function($){

	$('.man, .woman').on('click', function(e){
		
		var gender_link = 'http://localhost/terminsprojekt/product_categories/';
		if($(this).hasClass('man')){
			gender_link += 'man';
		}else if($(this).hasClass('woman')){
			gender_link += 'woman';
		}
		$.ajax({
			url: gender_link
		}).done(function(res) {
			$('.content').html( res );
		});

		$('.man').css("transform", "translateX(-100%)");
		$('.woman').css("transform", "translateX(+100%)");

	});

	$('.content').delegate('.back', 'click', function(e){

		$('.man').css("transform", "translateX(0)");
		$('.woman').css("transform", "translateX(0)");

	});

	var products = [];

	
	$('.content').delegate('.product-link', 'click', function(e) {
		e.preventDefault();
		if($('.lightbox-product').text() === ''){
			var url = $(this).attr('href');
			$.ajax({
				url: url
			}).done(function(res) {
				$('.content').append( res );
			});
	}else{
		$('.lightbox-product').html('');
	}
	});

	$('.content').delegate('.close', 'click', function(){
		$('.lightbox-product').html('');
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