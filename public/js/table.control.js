	$('.drop-actions a').on('click',function(e){
	
			action 	   = $(this).data('action');
		
			selections = $('#table_data').bootstrapTable('getSelections');
		
			bootbox.confirm('Está seguro que desea realizar esta accion?', function(result) {
	  		
			if(result){
  				
				selections = $.map( selections, function( val, i ) {
  					
  					return val.id;
  				
  				});
				
				$('#table_data').bootstrapTable('showLoading', true);
				 
  				 $.ajax({
				    type: "POST",
				    url: document.location.href,
				    data:{
				    	action: action,
				    	id:selections
				    },
				    success: function(data) {
				   	 
						 $('#table_data').bootstrapTable('refresh', {"silent":"true"});
						 
						 $('#table_data').on('load-success.bs.table',function(e){

			        		 $('#table_data').bootstrapTable('hideLoading', true);
			        	 });
				    }
				});
			
  			}});
			
			e.preventDefault();
	});
	    							    
	function activeicon(value, row) {
		
		if(row.active==1){
			return '<span class="actiona label label-success"  data-action="inactive" data-id="'+row.id+'"  style="cursor:pointer;"><i class="glyphicon glyphicon-ok"></i></span>';
		}else{
			return '<span class="actiona label label-danger"  data-action="active" data-id="'+row.id+'" style="cursor:pointer;"><i class="glyphicon glyphicon-ban-circle"></i></span>';
		}
	}

	function dateexpire(value,row){
		
		var now  = moment();
		
		var date =  moment(value);
		
		if(date.isValid()){
		
			if(date < now ){
				
				return '<span class="label label-danger">'+date.format('DD/MM/YYYY')+'</span>';
			
			}else{
				
				return '<span class="label label-success">'+date.format('DD/MM/YYYY')+'</span>';
				
			}
			
		}
	}
	
	function datelabel(value,row){
		
		var date =  moment(value);
		
		if(date.isValid()){
		
			return '<span class="label label-warning">'+date.format('DD/MM/YYYY')+'</span>';
		}
	}
	
	
		function datetime(value,row){
			
				var date =  moment(value);
			
				if(date.isValid()){
			
					return '<span class="label label-warning">'+date.format('DD/MM/YYYY hh:mm:ss')+'</span>';
					
				}
		}
	


	window.activeEvents = {
	    'click .actiona': function (e, value, row, index) {
		      
			action = $(this).data('action');
			  $.ajax({
			    type: "POST",
			    url: document.location.href,
			    data: $(this).data(),
			    success: function(data) {

			    },
			 });
			 
			  if(action=='inactive'){
			    
			    $(this).removeClass('label-success')
			 
			    $(this).toggleClass('label-danger');
			    
			    $(this).data('action','active');
			    
			    $(this).html('<i class="glyphicon glyphicon-ban-circle"></i>');
			  
			  }else{
			    $(this).removeClass('label-danger')
			 
			    $(this).toggleClass('label-success');
			    
			    $(this).data('action','inactive');
			    
			    $(this).html('<i class="glyphicon glyphicon-ok"></i>');
			  }
	    },

	};
	
	window.actionEvents = {
			'click .preview': function (e, value, row, index) {
				
				action = $(this).data('action');
				
		 		$("#myModal").modal('show');
		 		
		 		$('#iframe_preview').attr('src','/preview/?id='+row.id+'&action='+action);
		 		
		 		e.preventDefault();
			
			},
			'click .delete': function (e, value, row, index) {
			 	
				action = $(this).data('action');
				
				switch(action){
					case 'delete':
					  	
		  			  self = this;
		  		
		  				
			  			$.ajax({
							    type: "POST",
							    url: document.location.href,
							    data: $(self).data(),
							    success: function(data) {

							    },
						});
		  			   
		  			   
		  			 	$(self).children().removeClass('glyphicon glyphicon-trash icon-trash');
			  			
			 	 		$(self).children().toggleClass('glyphicon glyphicon-repeat icon-repeat');
			 	
			  			$(self).data('action','restore');
			  		 
			  			$(self).children().attr('title','Restaurar');
			  			
			  			$(self).parent().children('.totalremove').show();
		  			break;
			  		case 'totalremove':
				  	
				  		self = this;
				  		
				  		bootbox.confirm('Está seguro que desea borrar permanentemente?', function(result) {
				  		
				  			if(result){
				  				
				  				data = $(self).data();
				  				
				  				data.action ='delete';
				  				
				  				$('#table_data').bootstrapTable('showLoading', true);
				  				
				  				$.ajax({
									    type: "POST",
									    url: document.location.href,
									    data: data,
									    success: function(data) {
									    	$('#table_data').bootstrapTable('refresh');
									    	
									    	 $('#table_data').on('load-success.bs.table',function(e){

								        		 $('#table_data').bootstrapTable('hideLoading', true);
								        	 });
									    },
								});
				  			  
				  			 	$('[data-id='+row.id+']').parents('tr').remove();
				  			}
				  		}); 
				  		
				  	break;
				  	case 'restore':
				  		
						self = this;
						
						$.ajax({
						    type: "POST",
						    url: document.location.href,
						    data: $(self).data(),
						    success: function(data) {

						    },
						});
			  			
			  			$(self).children().removeClass('glyphicon glyphicon-repeat icon-repeat');
			 	
			  		 	$(self).children().toggleClass('glyphicon glyphicon-trash icon-trash');
			  		
			  		 	$(self).data('action','delete')
			  		 
			  		 	$(self).children().attr('title','Enviar a papelera');
			  		 	
			  		 	$(self).parent().children('.totalremove').hide();
			  		 	
			  		break;
				  }
				
			  	 e.preventDefault();
			}
}