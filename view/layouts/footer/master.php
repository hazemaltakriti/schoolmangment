
<script src='<?php  echo ASSET . DS . 'pagejs' . DS . 'master.js' ;  ?>'></script>  
<script>
		$('.js-pscroll').each(function(){
			var ps = new PerfectScrollbar(this);

			$(window).on('resize', function(){
				ps.update();
			})
		});
			
		
	</script>
