<?php
	get_header();
?>
<style>
	.accordion {
		 margin: 50px;
	}
	 .accordion dt, .accordion dd {
		 padding: 10px;
		 border: 1px solid black;
		 border-bottom: 0;
	}
	 .accordion dt:last-of-type, .accordion dd:last-of-type {
		 border-bottom: 1px solid black;
	}
	 .accordion dt a, .accordion dd a {
		 display: block;
		 color: black;
		 font-weight: bold;
	}
	 .accordion dd {
		 border-top: 0;
		 font-size: 12px;
	}
	 .accordion dd:last-of-type {
		 border-top: 1px solid white;
		 position: relative;
		 top: -1px;
	}
</style>
<div class="mainwrap">
	<div class="main clearfix">
		<div class="content fullwidth">
			<div class="posttext">
<?php
	if(function_exists('yoast_breadcrumb')) {
		yoast_breadcrumb('<p id="breadcrumbs" style="margin: 0 0;">','</p>');
	}
?>
				<h1>Tour Dates</h1>

				<h2>Current</h2>
				<dl class="accordion">
					<dt><a href="">Panel 1</a></dt>
					<dd>Pellentesque fermentum dolor. Aliquam quam lectus, facilisis auctor, ultrices ut, elementum vulputate, nunc.</dd>

					<dt><a href="">Panel 2</a></dt>
					<dd>Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.</dd>
					
					<dt><a href="">Panel 3</a></dt>
					<dd>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti.</dd>
				</dl>
				<h2>Past</h2>

			</div>
		</div>
	</div>
</div>
<script>
	(function($) {
    
  var allPanels = $('.accordion > dd').hide();
    
  $('.accordion > dt > a').click(function() {
    allPanels.slideUp();
    $(this).parent().next().slideDown();
    return false;
  });

})(jQuery);
</script>
<?php
	get_footer();





