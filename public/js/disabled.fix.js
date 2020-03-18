(function($){
		    var proxy = $.fn.serializeArray;
		    
		    $.fn.serializeArray = function(){
		        var inputs = this.find(':disabled');
		        inputs.prop('disabled', false);
		        var serialized = proxy.apply( this, arguments );
		        inputs.prop('disabled', true);
		        return serialized;
		    };
		    
		    var originalVal = $.fn.val;
		    
		    $.fn.val = function(){
		    	
		    	 var inputs = this.find(':disabled');
		    	
		    	 inputs.prop('disabled', false);
		    	 
		    	 var serialized = originalVal.apply( this, arguments );
		    	 
		    	 inputs.prop('disabled', true);
		    	 
		    	 return serialized
		    };
		    
		})(jQuery);