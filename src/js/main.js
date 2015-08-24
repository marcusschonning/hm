jQuery(function($){

	var products = [];
	//OM MAN KLICKAR PÅ MAN ELLER KVINNA
	$('.male, .female').on('click', function(e){
		
		// var gender_link = 'http://hm.marcus-schonning.se/product_categories/';
		var gender_link = 'http://localhost/terminsprojekt/product_categories/';
		if($(this).hasClass('male')){
			gender_link += 'man';
			$('.content').toggleClass('.content-man');
		}else if($(this).hasClass('female')){
			gender_link += 'woman';
			$('.content').toggleClass('.content-woman');
		}

		$.ajax({
			url: gender_link
		}).done(function(res) {
			$('.content').html( res );
			
			var lastPosLeft = 0;
			var currentPosLeft = 0;
			var sRight = true;
			var sLeft = false;
			$('.product-slider').scroll(function(e) {
				//console.log($(this).children().position().left);
				currentPosLeft = $(this).children().position().left;
				//console.log(1);
				if(currentPosLeft%2 == 0){
					lastPosLeft = currentPosLeft;
					//console.log(2);
				}
				//console.log('last pos:'+lastPosLeft+', currentpos:'+currentPosLeft);
				if(lastPosLeft > currentPosLeft && sRight){
					console.log('scroll till höger');
					var currentElement = $('.product-slider div').next();
					$('.product-slider').animate({scrollLeft: $(currentElement).offset().left}, 800);
					sRight = false;
					setTimeout(function(){
						sLeft = true;
					}, 800);
					
				}else if(lastPosLeft < currentPosLeft && sLeft){
					console.log('scroll till vänster');
					var currentElement = $('.product-slider div').next();
					$('.product-slider').animate({scrollLeft: -1 * $(currentElement).offset().left}, 800);
					sLeft = false;
					setTimeout(function(){
						sRight = true;
						
					}, 800);
				}

			});
		});

		$('.male').css("transform", "translateX(-100%)");
		$('.female').css("transform", "translateX(+100%)");

	});

	//OM MAN KLICKAR PÅ TILLBAKAKNAPPEN
	$('.content').delegate('.back', 'click', function(e){

		$('.male').css("transform", "translateX(0)");
		$('.female').css("transform", "translateX(0)");
		$('.content').html('');

	});

	

	//OM MAN KLICKAR PÅ EN KATEGORI
	$('.content').delegate('.cat', 'click', function(e){
		var category = $(this).attr('category');
		var row = $("<div></div>");
		$(".product-slider").html('');
		$('.lightbox-product').html('');
		$("#all-products-container a").each(function(i){

			if($(this).hasClass(category)){
				row.append($(this).clone());
				console.log("Moving link");
				if(row.find("a").length>=3){
					$(".product-slider").append(row);
					row=$("<div></div>");
				}
				
			}

		});
		if(row.find("a").length>0) {
			$(".product-slider").append(row);
		}


	});

	//OM MAN KLICKAR PÅ EN PRODUKT
	$('.content').delegate('.product-link', 'click', function(e) {
		e.preventDefault();
		var link = $(this);
		if($('.lightbox-product').text() === ''){
			var url = $(this).attr('href');
			$.ajax({
				url: url
			}).done(function(res) {
				$('.content ').append( res );
			});
	}else{
		$('.lightbox-product').html('');
		var url = $(this).attr('href');
		$.ajax({
				url: url
			}).done(function(res) {
				$('.content ').append( res );
			});
		}
	});

	//SLICK
	


	
	$('.content').delegate('.close', 'click', function(){
		$('.lightbox-product').html('');
	});

	$('.content').delegate('.add-to-cart', 'click', function(){
		
		var id = parseInt($(this).siblings('.title').attr('product-id'));
		var name = $(this).siblings('.title').text();
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
		console.log(name)
		console.log(price);
		console.log(color);
		console.log(size);
		console.log(products);
		
		var obj = JSON.stringify({ 'products': products });
		localStorage.setItem('products', obj);

		$('.sidebar .cart').append('<li>'+name+', '+price+':-</li>')
		updateCart();
	});

	function updateCart(){
		// var url = 'http://hm.marcus-schonning.se/hm/json/set_cart.php';
		var url = 'http://localhost/terminsprojekt/hm/json/set_cart.php';
		$.post(
			url,
			{ 'json_obj': localStorage.getItem('products') },
			function(res){
				console.log(res);
				// var link = 'http://hm.marcus-schonning.se/hm/app/hm_app.php?cart=' + res;
				var link = 'http://localhost/terminsprojekt/hm/app/hm_app.php?cart=' + res;
				$('.qr').html('').qrcode({
					size: 100,
					text: link
				});
			}
		);
	}

	if ($('video').hasClass('bg-vid')) {

		var vid = $(".bg-vid");

		vid.bind("loadeddata", function(e){

			setInterval(function(){
				var time = e.target.currentTime;
				console.log(time); 
			

				switch (true) {
				case (time > 3.8 && time < 5.8):
					console.log("4 seconds");
					$(".vid-qr").css("opacity", "1");
					$(".vid-qr").css("top", "280px" );
					$(".vid-qr").css("left", "170px" );
					break;
				case (time > 6 && time < 7.5):
					console.log("5 seconds");
					$(".vid-qr").css("opacity", "1");
					$(".vid-qr").css("top", "380px" );
					$(".vid-qr").css("left", "470px" );
					break;
				case (time > 7.7 && time < 8.8): 
					console.log("7 seconds");
					$(".vid-qr").css("opacity", "1");
					$(".vid-qr").css("top", "180px" );
					$(".vid-qr").css("left", "170px" );
					break;
				case 3:
					day = "Wednesday";
					break;
				case 4:
					day = "Thursday";
					break;
				case 5:
					day = "Friday";
					break;
				case  6:
					day = "Saturday";
					break;
				default:
					$(".vid-qr").css("opacity", "0");
					break;

				}
			}, 100);
			
		});
	}

});