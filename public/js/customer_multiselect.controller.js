$(document).ready(function($) {
    $('#multi_d').multiselect({
        right: '#multi_d_to',
        rightSelected: '#multi_d_rightSelected',
        leftSelected: '#multi_d_leftSelected',
        rightAll: '#multi_d_rightAll',
        leftAll: '#multi_d_leftAll',
 
        search: {
            left: '<input type="text" name="q" class="form-control" placeholder="Buscar..." />'
        },
 
        moveToRight: function(Multiselect, $options, event, silent, skipStack) {
          
          var button = $(event.currentTarget).attr('id');
 
          if (button == 'multi_d_rightSelected') {
                
        	  
        	  /**
        	   * Get selected value
        	   */
        	  var selected = $('#multi_d :selected').val();
        	  
        	  var new_combination = $('#multi_d_to option');
        	  
        	  $.ajax({
 		         url: "/customer",
 		         type: "POST",
 		         data: "product_dependencies=" + selected,
 		         success: function(data) {
 		         
 		        	 	var data = jQuery.parseJSON(data);
 		        	
	 		        	/**
	 		        	 * Exclude
	 		        	 */
 		        	 	
 		        	 	$error=false;
 		        	 	
 		        	 	var message ="Producto está excluido por : \n\n"
 		        	 	$.each(data.exclude,function(key,value){
 		        	 		
 		        	 		var new_combination_values = new_combination.map(function() {return this.value;});
 		        	 		
 		        	 		
 		        	 		$combination = $.inArray(value, new_combination_values);
 		        	 		
 		        	 		if($combination != -1) {
 		        	 			
 		        	 			var conflict = $(new_combination[$combination]).text();
 		        	 			
 		        	 			message +=conflict+"\n\n";
 		        	 			
 		        	 			$error=true;
 		        	 		}
 		        	 	});
 		        	 	
 		        	 	
 		        	 	if($error==false){
	 		        	 	/**
	 		        	 	 * Requires
	 		        	 	 */
	 		        	 		data.require = $.map(data.require,function( val ) {
			 		        		  return ('option[value="'+val+'"]');
			 		            });
			 		        	
		 		        	
			 		        	var requires = data.require.join(); 
		 		        	
		 		        		if(requires!=''){
			 		        	   var $left_options = Multiselect.$left.find('optgroup > option:selected,> option:selected,'+requires);
			 		        	}else{
			 		        		 var $left_options = Multiselect.$left.find('optgroup > option:selected,> option:selected');
			 		        	}
		 		        	 
		 		        		Multiselect.$right.eq(0).append($left_options);
		 		        		
		 		        		 $('#multi_d_to option').prop('selected', 'selected');
 		        	 	}else{
 		        	 		alert(message);
 		        	 	}
 		        	 }
 		     });
        	  
        
               
	        	  
       	   

             
          }
        },
 
        moveToLeft: function(Multiselect, $options, event, silent, skipStack) {
            var button = $(event.currentTarget).attr('id');
 
            if (button == 'multi_d_leftSelected') {
                var $right_options = Multiselect.$right.eq(0).find('optgroup > option:selected,> option:selected');
                Multiselect.$left.append($right_options);
            
            } else if (button == 'multi_d_leftAll') {
                var $right_options = Multiselect.$right.eq(0).children(':visible');
                Multiselect.$left.append($right_options);
 
             
            }
        }
    });
});