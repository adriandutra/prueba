@extends('backend.layouts.app')

@section('htmlheader_title')
   Media Servers

@endsection
@section('contentheader_title')
   Media Servers
@endsection

@section('content')


<div class="row">
  <div class="col-lg-12">
	<div class="panel panel-default">
	<div class="panel-heading">
		<a class="btn btn-primary" style="" href="/user" >Nuevo</a>
  <div id="toolbar">
	<div class="form-inline" role="form" id="actions_dropmenu">
		<div class="dropdown" style="">
			<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Accciones
			<span class="caret"></span></button>
			<ul class="dropdown-menu drop-actions">
				<li style=""><a href="#" data-action="inactive"><i class="glyphicon glyphicon-ban-circle ban-circle" style="color:#d9534f;"></i> Desactivar seleccionado</a></li>
				<li style=""><a href="#" data-action="active"><i class="glyphicon glyphicon-ok icon-ok" style="color:#5cb85c;" ></i> Activar seleccionado</a></li>
				<li style=""><a href="#" data-action="restore"><i class="glyphicon glyphicon-repeat icon-repeat" style="color:#30a5ff;" ></i> Restaurar seleccionado</a></li>
				<li style=""><a href="#" data-action="delete"><i class="glyphicon glyphicon-trash icon-trash" style="color:#30a5ff;"></i> Borrar seleccionado</a></li>
			</ul>		
		</div>
	 </div>
	</div>
</div>

<div class="panel-body">
				
						<table class="table-striped" 
						data-toggle="table" 
						data-url="{{url('api/v1/cdn/mediaservers') }}"  
						data-show-refresh="true" 
						data-show-toggle="true" 
						data-show-columns="true" 
						data-search="true" 
						data-pagination="true" 
						data-show-refresh="true" 
						
						data-page-number="1"  
						data-toolbar="#toolbar"
						data-detail-view="false"
						data-mobile-responsive="true"
						data-advanced-search="true"
						data-id-table="advancedTable"
						data-reorderable-columns="true"
						data-show-export="{export_perm}"
						id="table_data"
						data-click-to-select="false"
						data-cookie="true"
               			data-cookie-id-table="roles"
               			data-resizable="true"
						 ><thead>
						    <tr>
						   		<!-- BEGIN list_show -->
						        	<th data-checkbox="true" ></th>
						     	<!-- END list_show -->
						        <th data-field="id"  data-sortable="true" data-align="center">ID</th>
						        
						        <th data-field="label"  data-sortable="true" data-align="center">Nombre</th>
						        
						       	<th data-field="connections"  data-sortable="true" data-align="center">Viewers</th>
						       
						        <th data-sortable="true" data-align="center" data-formatter="memory">Memoria</th>   
                                
						        <th  data-sortable="true" data-align="center" data-formatter="disk">Disco</th>   
                                
                                <th   data-sortable="true" data-align="center" data-formatter="cpu">Cpu</th> 
						        
						        <th  data-sortable="true" data-align="center" data-formatter="transfer">Tranfer</th> 
						        
						        <th data-field="status"  data-sortable="true" data-align="center" data-formatter="status">Estado</th>
						      
						        <th data-field="last_check" data-sortable="true" data-formatter="datetime" data-align="center">Check</th>
						        <!-- BEGIN edit_show -->
						        	<th  data-events="activeEvents" data-field="active" data-sortable="true" data-formatter="activeicon" data-align="center">Activo</th>
								<!-- END edit_show -->
								<!-- BEGIN action_show -->
									<th  data-events="actionEvents" data-formatter="actionicons" data-searchable="false" data-switchable="false" data-align="center">Acciones</th>
						        <!-- END action_show -->
						    </tr>
						    </thead>
						</table>
					</div>
	  </div>
	 </div>
</div><!--/.row-->

	<div id="iframemodal" class="modal hide fade" tabindex="-1" role="dialog">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Dialog</h3>
		</div>
		<div class="modal-body">
	      <iframe src="" style="zoom:0.60" frameborder="0" height="250" width="99.6%"></iframe>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal">OK</button>
		</div>
	</div>

@endsection
@section('custom-scripts')


	<script>
	var url ="/mediaserver";
	
	

	function transfer(value,row){
		if(row.status!="stopped"){
			html=' down : '+(row.rx/1024).toFixed(2)+' Mb/s <br/> up : '+(row.tx/1024).toFixed(2)+' Mb/s';
			return html;
		}
	}
	
	function cpu(value,row){
		if(row.status!="stopped"){
			html='Load / '+row.cpu_load+'<br/>Av / '+row.cpu_average;
			return html;
		}
	}
	
	
	function memory(value,row){
		if(row.status!="stopped"){
			html='Libre : '+(row.mem_free/1024).toFixed(2)+'GB<br/>Usada : '+(row.mem_used/1024).toFixed(2)+'GB<br/>Total : '+row.mem_percent+ '%'+'<br/>Heap : '+(row.heap_usage/1024).toFixed(2)+"GB";
			return html;
		}
	}
	
	function disk(value,row){
		if(row.status!="stopped"){
			html='Usado : '+row.disk_used+'GB<br/>Libre : '+row.disk_free+'GB<br/> Total : '+row.disk_percent;
			return html;
		}
	}
	
	
	function status(value, row) {
		
		if(value=="stopped"){
			html='<i class="glyphicon glyphicon-off icon-off" title="offline" style="color:red;"></i>';
		}else{
			html='<i class="glyphicon glyphicon-ok icon-ok" title="online" style="color:green;"></i>';
		}
		
		return html;
	}
    
    
	function actionicons(value, row) {
		
		html ='';
		
		display='display:none;'
			
		
		html+='<a href="'+url+'/'+row.id+'" title="Editar Informacion"><i class="glyphicon glyphicon-pencil icon-pencil" style="{edit_perm}"></i></a> ';
		
		html+=' <a id="cmd" style="cursor: pointer; cursor: hand;"><i onclick="bootbox.alert(\'curl -s '+server+'/loadbalancer/get | bash -s '+row.id+' '+row.interface+'\');" class=" glyphicon glyphicon-list-alt icon-list-alt" style="{edit_perm}"></i></a>';
		if(row.trash=='1'){
			display='';
		
			html+=' <a href="#" class="delete" data-action="restore" data-id="'+row.id+'" style="{delete_perm}"><i class="glyphicon glyphicon-repeat icon-repeat" title="Restaurar"></i></a> ';
		
		}else{
			html+=' <a href="#" class="delete" data-action="delete" data-id="'+row.id+'" style="{delete_perm}"><i class="glyphicon glyphicon-trash icon-trash" title="Enviar a papelera"></i></a> ';
		}
			
		 html+=' <a href="#" class="delete totalremove" data-action="totalremove" data-id="'+row.id+'" style="'+display+' {delete_perm}"><i class="glyphicon glyphicon-remove icon-repeat" title="Eliminar"></i></a> ';
		
		 
		 
		 return html;
	}
	
	setInterval( function () {
		$('#table_data').bootstrapTable('refresh', {"silent":"true"}); // user paging is not reset on reload
	}, 10000 );
	

	</script>
	<script src="{{ asset ('js/table.control.js')}}"></script>

@endsection

