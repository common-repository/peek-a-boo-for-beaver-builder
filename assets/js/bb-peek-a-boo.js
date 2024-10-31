(function($) {

	$(window).load(function() {

		$('.pab-displaynone').fadeIn(200);

		var previewCount = '0';

		// Preview Animation
		var ms_bb_preview = function() {
			var panelVisible = $('.fl-builder-panel').is(':visible');
			$('#peek-a-boo i').removeClass('fa-eye').addClass('fa-eye-slash');
			$('html').addClass('peek-a-boo');
			$('.fl-builder-bar').stop().slideUp(500);
			if (panelVisible) {
			$('.fl-builder-panel').stop().animate({'right':-350}, 500);
			}
		}

		var ms_bb_preview_remove = function(){
			var panelVisible = $('.fl-builder-panel').is(':visible');
			$('#peek-a-boo i').removeClass('fa-eye-slash').addClass('fa-eye');
			$('html').removeClass('peek-a-boo');
			$('.fl-builder-bar').stop().slideDown(500);
			if (panelVisible) {
			$('.fl-builder-panel').stop().animate({'right':0}, 500);
			}
		}

		$('#peek-a-boo').click(function() {
			if (previewCount === '0') {
				ms_bb_preview();
				previewCount = '1';
			} else if (previewCount === '1') {
				ms_bb_preview_remove();
				previewCount = '0';
			}
		});

		// Tooltips
		$('#peek-a-boo-wrapper span').hover(function() {
			$('.pab-tooltip', this).stop().css({'display' : 'block'}).animate({'opacity' : 1, 'left' : 70});
		}, function() {
			$('.pab-tooltip', this).stop().css({'display' : 'none', 'left' : 65, 'opacity' : 0});
		});

	});

})( jQuery );