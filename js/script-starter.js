var nav;
var list;
var timeout;

jQuery(function($){

	/* Image and Image Viewer Scripts */

	var w = $(window);
	var w_width = w.width();
	var w_height = w.height();
	var body = $('body');
	var overlay = $("#overlay");
	var viewer = $("#viewer");
	var viewer_content = viewer.find("#viewer_content");
	var zoom = $("#zoom");
	var viewer_close = $("#viewer_close");
	
	$(".zoom").each(function(i, e) {
		$(e).on({
			mouseenter: function() {
				var img = $(this);
				var img_pos = img.position();
				
				zoom.position(img_pos);
				img.addClass("hover").stop().animate({
					opacity: '.5'
				});
				zoom.css({
					top: img_pos.top,
					left: img_pos.left,
					opacity: '0',
					display: 'block'
				}).stop().animate({
					opacity: '1'
				});
			}
		});
	});

	w.on({
		resize: function(){
			w_width = w.width();
			w_height = w.height();
			var full_ruler = $("#full_ruler");
			var full_width = full_ruler.width();
			var full_height = full_ruler.height();
			var x = (w_width / 2) - (full_width + 14) / 2;
			var y = (w_height / 2.5) - full_height / 2;

			viewer_close.css({
				top: '-7px',
				left: full_width
			});
			viewer.css({
				top: y,
				left: x,
			});
		}
	});

	zoom.on({
		mouseleave: function(){
			var img = $(".hover").removeClass("hover").stop().animate({
				opacity: '1'
			});
			zoom.stop().animate({
				opacity: '0'
			}, function(){
				zoom.css("display", "none");
			});
		},
		click: function(){
			var img = $(".hover");
			var fullsize_src = img.attr('href');
			$("<img id='full_ruler' style='display: none;' src='" + fullsize_src + "' />").appendTo('body');
			var full_ruler = $("#full_ruler");
			full_ruler.load(function(){
				var full_width = full_ruler.width();
				var full_height = full_ruler.height();
				var x = (w_width / 2) - (full_width + 14) / 2;
				var y = (w_height / 2.5) - full_height / 2;
				viewer_content.html("<img src='" + fullsize_src + "' />").css({
					width: full_width,
					height: full_height
				});
				viewer_close.css({
					top: '-7px',
					left: full_width
				});
				viewer.css({
					top: y,
					left: x,
					opacity: 0,
					display: 'block'
				}).animate({
					opacity: 1
				}, 500);
				overlay.css("display", "block").animate({
					opacity: '.8'
				}, 500);
			});
			
			return false;
		}
	});

	viewer_close.on({
		click: function(){
			viewer.animate({
				opacity: 0
			}, 500, function(){
				viewer.css({
					display: 'none'
				});
			});
			overlay.animate({
				opacity: 0
			}, 500, function(){
				overlay.css({
					display: 'none'
				});
			});
			$("#full_ruler").remove();
			
			return false;
		}
	});

	overlay.on({
		click: function(){
			viewer_close.trigger('click');
			return false;
		}
	});


	/* Navigation Scripts */
	nav = $('nav');
	list = nav.find('ul');
	var list_width = list.width();
	/*list.width(list_width);
	list.find('li').css({
		'margin-top': '-38px'
	});*/

	nav.find('#search_field').hover(function(){
		clearTimeout(timeout);
	}, function() {
		hide_search(list);
	}).focus(function(){
		if($(this).val() == "type, hit enter...") {
			$(this).val("");
			$(this).next().css('background-position', 'center -37px')
		}
	}).blur(function(){
		if($(this).val() == "") {
			$(this).val("type, hit enter...");
		}
	});

	var search_button = $('#search_button');

	search_button.hover(function(){
		$(this).addClass('hover');
		clearTimeout(timeout);
		reveal_search(list);
	}, function(){
		$(this).removeClass('hover');
		hide_search(list);
	}).click(function(){
		return false;
	});

	search_button.click(function(){
		if(nav.find('#search_field').val() === "type, hit enter...") {
			//alert("Nope! Chuck Testa.");
			$("#searchform").submit();
		} else {
			$("#searchform").submit();
		}
	});

	//hide_search(list);

});


function reveal_search(e) {
	var $ = jQuery;
	e.find('li:nth-child(3)').delay().animate({
		'margin-top': '-37px'
	}, 100, 'swing' , function(){
		list.find('li:nth-child(2)').stop().animate({
			'margin-top': '-37px'
		}, 100, 'swing', function(){
			list.find('li:nth-child(1)').stop().animate({
				'margin-top': '-37px'
			},  100, 'swing', function(){
				list.css('z-index', '1').find('li').css({
					'border-left': '#333 1px solid',
					'border-right': '#333 1px solid'
				});
				$('nav form').css('z-index', '2');
				setTimeout(function(){
					$("#search_field").focus();
				}, 500);
			});
		});
	});
}

function hide_search(e) {
	var $ = jQuery;
	if(nav.find('#search_field').val() === "type, hit enter..." || nav.find('#search_field').val() === "") {
		timeout = setTimeout(function(){
			if(!$('#search_field').is('.hover') || !$('#search_button').is('.hover')) {
				list.css('z-index', '2').find('li').css({
					'border-left': '#626262 1px solid',
					'border-right': '#000 1px solid'
				});
				$('nav form').css('z-index', '1');
				e.find('li:nth-child(1)').stop().animate({
					'margin-top': '0px'
				}, 100, 'swing' , function(){
					list.find('li:nth-child(2)').stop().animate({
						'margin-top': '0px'
					}, 100, 'swing', function(){
						list.find('li:nth-child(3)').stop().animate({
							'margin-top': '0px'
						},  100, 'swing');
						nav.find('button').css('background-position', 'center 0px');
						nav.find('#search_field').val('type, hit enter...').blur();
					});
				});
			}
		}, 200);
	}
}
