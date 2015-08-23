jQuery(function($){

	$('.qr').html('').qrcode({
					size: 100,
					text: "bajs"
				});

	
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
			// $('.product-slider').isotope({
			// 	// options
			// 	itemSelector: '.product-link',
			// 	layoutMode: 'fitRows',
			// 	filter: '.insp'
			// });
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
		$(".product-slider").html('')
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


		$('.product-slider').slick({
			swipe: true,
			cssEase: 'ease-in',
			dots: true
		});
	});

	//OM MAN KLICKAR PÅ EN PRODUKT
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

	//SLICK
	


	
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
				var time = Math.floor(e.target.currentTime);
				console.log(time); 
			

			switch (time) {
			case 3:
				console.log("3 seconds");
				$(".vid-qr").css("visibility", "visible");
				$(".vid-qr").css("top", "280px" );
				$(".vid-qr").css("left", "170px" );
				break;
			case 8:
				console.log("7 seconds");
				$(".vid-qr").css("top", "380px" );
				$(".vid-qr").css("left", "470px" );
				break;
			case 2:
				day = "Tuesday";
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

			};
			}, 1000);
			
	});

		

		
		
		


	}
});





