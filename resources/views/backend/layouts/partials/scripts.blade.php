 <script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
 <script src="{{ asset('js/disabled.fix.js') }}"></script>
 <script src="{{ asset('js/jquery.browsers.js') }}"></script>
 <script src="{{ asset('js/js.cookie.js') }}"></script>
 <script src="{{ asset('js/bootstrap.min.js') }}"></script>
 <script src="{{ asset('js/bootbox.js') }}"></script>
 <script src="{{ asset('js/moment.js') }}"></script>
 
 	<!--
	<script src="{{ asset('js/chart.min.js') }}"></script>
	<script src="{{ asset('js/chart-data.js') }}"></script>
	<script src="{{ asset('js/easypiechart.js') }}"></script>
	<script src="{{ asset('js/easypiechart-data.js') }}"></script>
			
	<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
	-->
	<script>
		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
		
		$('.nav > .parent').on('click', function() {
    	    	 $(this).addClass('active');
    	    	 
    	    	 Cookies.set('last_tab',JSON.stringify({active:$(this).attr('id')}),{ expires: 1, path: '/'});
    	    	 
    	    	 $(this).siblings().removeClass('active');
 	     });    
	
		
		$('.submodule').on('click',function(e){
			 
			Cookies.set('last_subtab',JSON.stringify({active:$(this).attr('id')}),{ expires: 1, path: '/' });
		
			document.location.href	= $(this).attr('href');
			
			e.preventDefault();
		});
		
		$(function() { 
			 // activate latest tab, if it exists:
			
				if (Cookies.get('last_tab')!==undefined) {
				 
				  var lastTab = JSON.parse(Cookies.get('last_tab'));
			    
				  $('#'+lastTab.active).addClass('active');
			     
			      collapse_id  = lastTab.active.replace('p_','s_');
			      
			      $('#'+collapse_id).collapse();
			  }
			  
			  if(Cookies.get('last_subtab')!==undefined){
				  
				  var lastSubTab = JSON.parse(Cookies.get('last_subtab'));
				  
				  $('#'+lastSubTab.active).addClass('submenu_active');
			  }
		});
		
	</script>
<script src="{{ asset('/js/select2.min.js') }}"></script>
<script type="text/javascript">
  $('select:not(.skip-me)').select2();
</script>

<script src="{{ asset ('js/bootstrap-table.js')}}"></script>
<script src="{{ asset ('js/extensions/bootstrap-table-cookie.js')}}"></script>
<script src="{{ asset ('js/extensions/bootstrap-table-mobile.js')}}"></script>
<script src="{{ asset ('js/extensions/bootstrap-table-toolbar.js')}}"></script>
<script src="{{ asset ('js/extensions/tableExport.js')}}"></script>
<script src="{{ asset ('js/extensions/bootstrap-table-export.js')}}"></script>
<script src="{{ asset ('js/extensions/bootstrap-table-resizable.js')}}"></script>
<script src="{{ asset ('js/extensions/colResizable-1.5.source.js')}}"></script>