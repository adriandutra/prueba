	$(document).ready(function() {
		
	
		var own_cdn = $('input[name="own"]');
		
		own_cdn.on('click',function(){   

			show_hide_server($(this).val());
		
		});
		
		
		show_hide_server($('input[name="own"]:checked').val());
		
		function show_hide_server(val){
			
			if(val=="0"){ 
	
			   $('.hls').show();
	
			   $('.servers,.dvr').hide();
			   
			 }else{
			 
			  $('.hls').hide();
	
			  $('.servers,.dvr').show();
			 
			 }	
			
			$('#send-form').validator('update');
		}

		
		$('select').on("select2:select", function (e) {
			$('#calendar').fullCalendar('refetchEvents');
		});
		
		$('#calendar').fullCalendar({
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'month,agendaWeek,agendaDay,listWeek'
				},
				timeFormat:'h:mm t', 
				navLinks: true, // can click day/week names to navigate views
				editable:false,
				eventLimit: true, // allow "more" link when too many events
				eventClick: function(calEvent, jsEvent, view) {
						
					 p_event =  $(this);
					
					/*
					 *Event still does not happen
					 */
					 
					 now = moment().add('15m');

					if (calEvent.start > now) {

						if(calEvent.record === undefined){
							
							if(confirm('Desea agregar todas las emisiones de este evento de la cola de grabación?')){
							
								$.ajax({
						    		url: server+'/epg/record/'+calEvent.i_program,
						            dataType: 'json',
						            method:'PUT',
						            cache:false,
						            headers:{
									    "authorization": authorization,
									},
									success: function(){
										$('#calendar').fullCalendar('refetchEvents');
								    }
						        });
							
							}else{
								
								if(confirm('Desea agregar unicamente esta emision?')){
									
									myDate =  moment(calEvent.start).format("YYYY-MM-DD HH:mm:ss");
									
									$.ajax({
							    		url: server+'/epg/record/event/'+calEvent.i_program+'/'+myDate,
							            dataType: 'json',
							            method:'PUT',
							            cache:false,
							            headers:{
										    "authorization": authorization,
										},
										success: function(){
											$('#calendar').fullCalendar('refetchEvents');
									    }
							        });
								}
							}
					
						}else{
							if(!calEvent.no_delete){
								if(calEvent.unique){
									text= 'Desea borrar la emision de la cola de grabación?';
									
								}else{
									text= 'Desea borrar el evento de la cola de grabación?';
								}
								
								if(confirm(text)){
									
								  	$.ajax({
								        
										url: server+'/epg/record/'+calEvent.i_program,
							            dataType: 'json',
							            method:'DELETE',
							            cache:false,
							            headers:{
										    "authorization":authorization,
										},
										success: function(){
											
											$('#calendar').fullCalendar('refetchEvents');
										}
							        });        
								
								}
							}	
						}
					}
				},
				
				events: function(start, end, timezone, callback) {
					
						begin_date =     moment(start).format("YYYY-MM-DD HH:mm:ss");
						
						end_date   =  	 moment(end).format("YYYY-MM-DD HH:mm:ss");
					
						i_service  =  $('#i_service').val();
						
						
					 $.ajax({
			            url: server+'/epg/events/'+i_service+'/'+begin_date+'/'+end_date,
			            dataType: 'json',
			            cache:false,
			            headers:{
						    "authorization": authorization,
						},
			            success: function(date_event) {
			              
			            	var events=[];
			            	
			            
			            	$(date_event).each(function(key,val){
			            		
			            			 start_time =  moment(val.start_time);
			            			 
			            			 begin_record =  moment(val.begin_record);
			            			 
			            			 var duration = moment(val.duration, "HH:mm:ss");

									 end_time    = moment(val.start_time).add(duration.hours()*60 + duration.minutes(), 'm');
								
									 
									if(val.i_record!=null){
										
										
										/**
										 * if event record
										 * 
										 */
										if (moment(val.start_time) < moment().add('15m')){
										
											background_color_record ='#239567';
											
										}else{
											background_color_record ='#800000';
										}
										
										if(begin_record.isValid()){
											
											//*unique event
											if(val.start_time==val.begin_record){
											
												events.push({
							                    	title: val.name,
							                        start:start_time,
							                        i_event:val.i_event,
							                        i_program :val.i_program,
							                        end:end_time ,
							                        record:true,
							                        unique:true,
							                        quantity :val.quantity,
							                        backgroundColor :background_color_record
							                	});
											
											}else{
												
												events.push({
							                    	title: val.name,
							                        start:start_time,
							                        i_event:val.i_event,
							                        i_program :val.i_program,
							                        end:end_time ,
							                        record:true,
							                        no_delete:true,
							                        quantity :val.quantity,
							                    });
											}
										
										}else{
											
											events.push({
						                    	title: val.name,
						                        start:start_time,
						                        i_event:val.i_event,
						                        i_program :val.i_program,
						                        end:end_time ,
						                        record:true,
						                        quantity :val.quantity,
						                        backgroundColor :background_color_record
						                	});
										}
									
									
									}else{
									
										events.push({
					                    	title: val.name,
					                        start:start_time,
					                        i_event:val.i_event,
					                        i_program :val.i_program,
					                        quantity :val.quantity,
					                        end:end_time ,
					                   });
									}
							});
			            	
			            	 callback(events);
			            }
			        });
			    }
			});
		});

	
	
			var img_data = JSON.parse( $("#img-data").html());
	
			
			$("#file-0a").fileinput({
				 	language: 'es',
			        showPreview:true,
			        showClose:false,
			        allowedFileExtensions : ['jpg','jpeg'],
			        showUpload:false,
			        uploadAsync:false,
			        showRemove:false,
			        showUploadedThumbs :true,
			        //resizeImage: false,
			        //maxImageWidth: 200,
			        //maxImageHeight: 200,
			        resizePreference: 'width',
			        overwriteInitial:true,
			        initialPreviewShowDelete :false,
			        minFileCount:0,
			        maxFileCount:1,
			        initialPreview: (img_data.image !=false) ?  [img_data.image] : [],
			 		//uploadExtraData:{id:{id}}
			       //uploadUrl:document.location.href,
			 });
			 
			$('#send-form').validator().on('submit', function (e) {
              
            	if (e.isDefaultPrevented()) {
                
              
                } else {
                	
                	waitingDialog.show('Cargando');
                	
                    e.preventDefault();
                    
                	var formdata = new FormData(document.getElementById('send-form'));
                	
                    var inputFileImage = document.getElementById('file-0a');

                    var file = inputFileImage.files[0];

					formdata.append('file',file);

				    $.ajax({
                        url: document.location.href,
                        data: formdata,
                        type: "POST",
                        processData: false,
                        contentType: false,
                        success: function(data) {

							waitingDialog.hide();
                        	 
                      		$("#myModal").modal('show');
                        },
                    });
               
                }
            });
           